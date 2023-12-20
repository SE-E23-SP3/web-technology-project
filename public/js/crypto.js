const subtlecrypto = window.crypto.subtle;

function bytesToBase64(bytes, pad = true) {
	let byteArray = new Uint8Array(bytes);
	let result = btoa(String.fromCharCode(...byteArray));
	if (!pad) result = result.replaceAll("=", '');
	return result;
}

function bytesFromBase64(string) {
	let byteArray = Array.from(atob(string)).map((char) => char.charCodeAt(0));
	return Uint8Array.from(byteArray);
}

function encodeString(string) {
	return new TextEncoder().encode(string);
}

async function hmac256(message, rawKey) {
	const encodedMessage = encodeString(message);
	const importedKey = await subtlecrypto.importKey("raw", rawKey, {
		name: "HMAC",
		hash: "SHA-256"
	}, false, ["sign"]);
	return await subtlecrypto.sign("HMAC", importedKey, encodedMessage);
}

async function generateSalt(length = 16) {
	const salt = await self.crypto.getRandomValues(new Uint8Array(length));
	return bytesToBase64(salt);
}

async function pbkdf2(password, saltBytes, iterations = 600000) {
	const encodedPass = encodeString(password);
	const salt = await Promise.resolve(saltBytes);
	const importedKey = await subtlecrypto.importKey( "raw", encodedPass, "PBKDF2", false, ["deriveBits"]);
	const derivedPassword = await subtlecrypto.deriveBits(
		{
			name: "PBKDF2",
			hash: "SHA-256",
			salt: salt,
			iterations: iterations
		},
		importedKey,
		256
	);
	return bytesToBase64(derivedPassword);
}

async function deriveSaltFromEmail(email) {
	const siteConstant = getMetaValueByName("client-hash-site-constant");
	return hmac256(email.toLowerCase().trim().normalize(), bytesFromBase64(siteConstant));
}

async function hashPasswordWithEmail(password, email, iterations) {
	return pbkdf2(password.trim().normalize(), deriveSaltFromEmail(email), iterations);
}
