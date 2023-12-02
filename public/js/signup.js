const usernameField = new InputValidator(InputValidator.patterns.username, document.getElementById("usernameField"));
usernameField.useOKBorder = false;
const emailField = new InputValidator(InputValidator.patterns.email, document.getElementById("emailField"));
emailField.useOKBorder = false;
const passwordField = new InputValidator(InputValidator.patterns.password, document.getElementById("passwordField"));
const passwordRepeatField = new InputValidator(InputValidator.patterns.password, document.getElementById("passwordRepeatField"), (self) => {
	if (self.value === passwordField.value) {
		return true
	}
	self.insertError("Must match password");
	return false;
});


const CSRF = getMetaValueByName('csrf-token');

const submitButton = document.getElementById("submitButton");

const allFields = {
	usernameField: usernameField,
	emailField: emailField,
	passwordField: passwordField,
	passwordRepeatField: passwordRepeatField,
	check: function() {
		return Object.values(this).every(e => {
			if (!(e instanceof InputValidator)) return true;
			return e.check();
		});
	},
	disable: function(val) {
		return Object.values(this).forEach(e => {
			if (!(e instanceof InputValidator)) return true;
			return e.disabled = val;
		});
	}
}



const signUpForm = document.getElementById("signUp");


async function isValidUsername(username) {
	return new Promise((resolve, reject) => {
		setTimeout(() => {
			resolve(true);
			}, 40);
	});
}

async function prepareSignup(fieldsObject) {
	let isValidUserPromise = isValidUsername(fieldsObject.usernameField.value);
	let hashedPasswordPromise = hashPasswordWithEmail(fieldsObject.passwordField.value, fieldsObject.emailField.value, 600000);
	await Promise.all([isValidUserPromise, hashedPasswordPromise]);
	if (!(await isValidUserPromise)) throw new Error("Not valid user");
	return {
		username: fieldsObject.usernameField.value,
		hashedPassword: await hashedPasswordPromise,
		email: fieldsObject.emailField.value
	}
}




async function submitSignup(credentials) {
	const url = "/signup/submit";
	// console.log(`curl -H "X-CSRF-TOKEN: ${CSRF}" -H "Content-Type: application/json" --insecure --request "POST" --data '${JSON.stringify(credentials)}' 'https://192.168.105.3:8443/signup/submit'`);
	const response = await fetch(url, {
		method: "POST",
		credentials: "same-origin",
		headers: {
			"Content-Type": "application/json",
			"X-CSRF-TOKEN": CSRF,
			"Accept": "application/json"
		},
		body: JSON.stringify(credentials)
	});

	if (!response.ok) throw new Error(response.statusText);

	// console.log(await response.text());
	const jsonResponse = await response.json();
	console.log(jsonResponse);
	return jsonResponse;
}


signUp.addEventListener("submit", event => {
	event.preventDefault();
	if (!allFields.check()) return false;

	allFields.disable(true);
	submitButton.disabled = true;
	prepareSignup(allFields).then(submitSignup).then(jsonResponse => {
			console.log(jsonResponse.url);
			window.location.href = jsonResponse.url;
		}).catch(error => {
			console.error(error.message);
			allFields.disable(false);
			submitButton.disabled = false;
	});
});
