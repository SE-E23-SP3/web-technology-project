"use strict";



async function generateTotpSecret(length = 20) {
	return await self.crypto.getRandomValues(new Uint8Array(length));
}



function generateTotpUri(secret) {
	const scheme = "otpauth://totp/";
	const label = encodeURIComponent(originalUsername);
	const uriParams = new URLSearchParams();
	uriParams.set("secret", secret);
	uriParams.set("issuer", "smdb");
	return scheme + label + "?" + uriParams.toString();
}


const qrCode = new QRCode(document.getElementById("qrCodeTfa"));

let tfaSecretBase64 = null;

async function generatTotpQrCode() {
	generateTotpSecret().then(secret => {
		tfaSecretBase64 = bytesToBase64(secret);
		console.log(tfaSecretBase64);
		return secret;
		}).then(bytesToBase32).then(secret => {
			qrCode.makeCode(generateTotpUri(secret));
			console.log(generateTotpUri(secret));
	});

}


const setupTfaBtn = document.getElementById("setupTwoFactorBtn");
const tfaContainer = document.getElementById("tfaContainer");
setupTwoFactorBtn.addEventListener("click", e => {
	generatTotpQrCode();
	tfaContainer.classList.remove(ErrorContainerUtil.HIDDEN_CLASS);
	setupTwoFactorBtn.classList.add(ErrorContainerUtil.HIDDEN_CLASS);
});






const tfaEnableBtn = document.getElementById("saveTfa");
const tfaPasswordField = new InputValidator(InputValidator.patterns.generic, document.getElementById("tfaPasswordField"));
tfaPasswordField.useOKBorder = false;

const tfaCodeField = new InputValidator(InputValidator.patterns.totpCode, document.getElementById("tfaCodeField"));
tfaCodeField.useOKBorder = false;

const enableTfaFieldContainer = new FieldsContainer({
	tfaCodeField: tfaCodeField,
	passwordField: tfaPasswordField
});


async function enableTfa(fields) {
	console.log(fields.check());
	if (!fields.check()) return false;

	fields.disable(true);
	tfaEnableBtn.disabled = true;

	let hashedPassword = await hashPasswordWithEmail(fields.fields.passwordField.value, originalEmail, 600000);


	let response = await makeJSONPutRequest(BASE_SUBMIT_PATH + "enabletfa", {
		totpSecret: tfaSecretBase64,
		password: hashedPassword,
		totpVerificationCode: fields.fields.tfaCodeField.value
	});

	tfaContainer.classList.add(ErrorContainerUtil.HIDDEN_CLASS);
	document.getElementById("tfaSuccessMessageContainer").classList.remove(ErrorContainerUtil.HIDDEN_CLASS);
}

async function handleEnableTfaError(error) {
	enableTfaFieldContainer.disable(false);
	tfaEnableBtn.disabled = false;
	if (error.httpStatus == 401) {
		tfaPasswordField.insertError("Invalid password");
		return false;
	}

	if (error.json.message == "Totp: invalid verification code") {
		tfaCodeField.insertError("Invalid code");
		return false;
	}


	if (error.json.message == "Totp: already set") {
		tfaCodeField.insertError("Two factor authentication is already set!");
		return false;
	}

	throw error;
}

tfaEnableBtn.addEventListener("click", e => {
	enableTfa(enableTfaFieldContainer).catch(handleEnableTfaError).catch(handleFatalError);
});
