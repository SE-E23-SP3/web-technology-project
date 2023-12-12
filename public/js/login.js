"use strict";
const login = document.getElementById("login");
const submitButton = document.getElementById("submitButton");


const emailField = new InputValidator(InputValidator.patterns.email, document.getElementById("emailField"));
emailField.useOKBorder = false;
const passwordField = new InputValidator(InputValidator.patterns.password, document.getElementById("passwordField"));
passwordField.useOKBorder = false;


async function prepareLogin(fieldsObject) {
	let hashedPasswordPromise = hashPasswordWithEmail(fieldsObject.passwordField.value, fieldsObject.emailField.value, 600000);
	return {
		hashedPassword: await hashedPasswordPromise,
		email: fieldsObject.emailField.value
	}
}

async function submitSignup(credentials) {
	const url = "/login/submit";
	return await makeJSONPostRequest(url, credentials);
}


const allFields = {
	emailField: emailField,
	passwordField: passwordField,
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



async function handleSubmissionError(error) {
	allFields.disable(false);
	submitButton.disabled = false;

	if (error.json == undefined) throw error;

	if (error.httpStatus == 401) {
		passwordField.insertError("Invalid password or email");
	} else {
		throw error;
	}
}


login.addEventListener("submit", event => {
	event.preventDefault();
	if (!allFields.check()) return false;

	allFields.disable(true);
	submitButton.disabled = true;

	prepareLogin(allFields).then(submitSignup).then(jsonResponse => {
			window.location.href = getRedirectUrlFromParam(jsonResponse.url);
		}).catch(handleSubmissionError).catch(error => {
			errorContainerUtil.displayError();
			console.error(error.json ?? error);
	});
}, true);


let signupUrl = new URL(location.href); // copy url
signupUrl.pathname = "/signup";
document.getElementById("signupBtn").href = signupUrl.href;
