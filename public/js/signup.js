"use strict";

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






async function prepareSignup(fieldsObject) {
	let hashedPasswordPromise = hashPasswordWithEmail(fieldsObject.passwordField.value, fieldsObject.emailField.value, 600000);
	return {
		username: fieldsObject.usernameField.value,
		hashedPassword: await hashedPasswordPromise,
		email: fieldsObject.emailField.value
	}
}




let formRestorer = new FormDataRestore("signup", {
	username: usernameField,
	email: emailField
});
formRestorer.restore();



async function submitSignup(credentials) {
	const url = "/signup/submit";
	return await makeJSONPostRequest(url, credentials);
}


signUp.addEventListener("submit", event => {
	event.preventDefault();
	if (!allFields.check()) return false;

	allFields.disable(true);
	submitButton.disabled = true;
	prepareSignup(allFields).then(submitSignup).then(jsonResponse => {
			window.location.href = getRedirectUrlFromParam(jsonResponse.url);
		}).catch(error => {
			allFields.disable(false);
			submitButton.disabled = false;

			formRestorer.save()

			alert("An error has occurred, try to refresh the page");

			location.reload();
	});
});
