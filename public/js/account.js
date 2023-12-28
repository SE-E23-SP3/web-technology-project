"use strict";

function handleFatalError(error) {
	errorContainerUtil.displayError();
	console.error(error.json ?? error);
}

const BASE_SUBMIT_PATH = "/account/submit/";
const OK_MESSAGE_CLASS = "ok-message";



const usernameField = new InputValidator(InputValidator.patterns.username, document.getElementById("usernameField"));
usernameField.useOKBorder = false;
let originalUsername = usernameField.value;
const saveUsernameButton = document.getElementById("saveUsernameButton");
async function updateUsername() {
	if (!usernameField.check()) return false;
	if (usernameField.value === originalUsername) return false;
	saveUsernameButton.disabled = true;
	usernameField.disabled = true;

	const response = await makeJSONPutRequest(BASE_SUBMIT_PATH + "updateusername", {
		username: usernameField.value
	});

	if (response.message === "Accepted") {
		let messageEelement = usernameField.insertError("Username updated succesfully");
		originalUsername = usernameField.value
		messageEelement.classList.add(OK_MESSAGE_CLASS);
		usernameField.okBorder();
		return true;
	} else {
		console.error(response);
	}
}
async function handleUpdateUsernameError(error) {
	usernameField.disabled = false;
	saveUsernameButton.disabled = false;
	if (error.json == undefined) throw error;

	switch (error.json.message) {
		case "User: taken":
			usernameField.insertError("Already taken!");
		break;
		default:
			throw error;
	}
}

saveUsernameButton.addEventListener('click', (e) => {
	updateUsername().catch(handleUpdateUsernameError).catch(handleFatalError);
});











const emailField = new InputValidator(InputValidator.patterns.email, document.getElementById("emailField"));
emailField.useOKBorder = false;
let originalEmail = emailField.value;

const emailPasswordField = new InputValidator(InputValidator.patterns.generic, document.getElementById("emailPasswordField"));
emailPasswordField.useOKBorder = false;

const saveEmailButton = document.getElementById("saveEmailButton");

const updateEmailFieldsContainer = new FieldsContainer({
	emailField: emailField,
	passwordField: emailPasswordField
});

async function updateEmail(fields) {
	if (!updateEmailFieldsContainer.check()) return false;
	if (fields.fields.emailField.value === originalEmail) return false;

	updateEmailFieldsContainer.disable(true);
	saveEmailButton.disabled = true;
	let hashedPasswordWithNewEmailPromise = hashPasswordWithEmail(fields.fields.passwordField.value, fields.fields.emailField.value, 600000);
	let hashedPasswordWithOldEmailPromise = hashPasswordWithEmail(fields.fields.passwordField.value, originalEmail, 600000);
	await Promise.all([hashedPasswordWithNewEmailPromise, hashedPasswordWithOldEmailPromise]);

	let response = await makeJSONPutRequest(BASE_SUBMIT_PATH + "updateemail", {
		newEmail: fields.fields.emailField.value,
		passwordHashedWithOldEmail: await hashedPasswordWithOldEmailPromise,
		passwordHashedWithNewEmail: await hashedPasswordWithNewEmailPromise
	});

	let errorMessageElement = emailField.insertError("Succesfully updated email");
	originalEmail = emailField.value;
	emailField.okBorder();
	errorMessageElement.classList.add(OK_MESSAGE_CLASS);
}

async function handleUpdateEmailError(error) {
	updateEmailFieldsContainer.disable(false);
	saveEmailButton.disabled = false;
	if (error.json == undefined) throw error;

	if (error.httpStatus == 401) {
		emailPasswordField.insertError("Invalid password");
		return false;
	}
	switch (error.json.message) {

		case "Email: taken":
			emailField.insertError("Already taken!");
		break;
		default:
			throw error;
	}
}

saveEmailButton.addEventListener("click", (e) => {
	updateEmail(updateEmailFieldsContainer).catch(handleUpdateEmailError).catch(handleFatalError);
});
















const oldPasswordField = new InputValidator(InputValidator.patterns.generic, document.getElementById("oldPasswordField"));
oldPasswordField.useOKBorder = false;

const newPasswordField = new InputValidator(InputValidator.patterns.password, document.getElementById("newPasswordField"), (self) => {
	if (self.value !== oldPasswordField.value) {
		return true
	}
	self.insertError("Cannot be same as your old password");
	return false;
});
newPasswordField.useOKBorder = false;
newPasswordField.check = function() {
	if (this.value.length === 0) return false;
	return InputValidator.prototype.check.call(this);
};

const newPasswordRepeatField = new InputValidator(InputValidator.patterns.password, document.getElementById("newPasswordRepeatField"), (self) => {
	if (self.value === newPasswordField.value) {
		return true
	}
	self.insertError("Must match your new password");
	return false;
});
newPasswordRepeatField.useOKBorder = false;
newPasswordRepeatField.check = function() {
	if (this.value.length === 0) return false;
	return InputValidator.prototype.check.call(this);
};


const savePasswordButton = document.getElementById("savePasswordButton");
const updatePasswordFieldsContainer = new FieldsContainer({
	oldPasswordField: oldPasswordField,
	newPasswordField: newPasswordField,
	newPasswordRepeatField: newPasswordRepeatField
});

async function updatePassword() {
	if (!updatePasswordFieldsContainer.check()) return false;
	updatePasswordFieldsContainer.disable(true);
	savePasswordButton.disabled = true;

	const oldHashedPasswordPromise = hashPasswordWithEmail(oldPasswordField.value, originalEmail, 600000);
	const newHashedPasswordPromise = hashPasswordWithEmail(newPasswordField.value, originalEmail, 600000);
	await Promise.all([oldHashedPasswordPromise, newHashedPasswordPromise]);

	let response = await makeJSONPutRequest(BASE_SUBMIT_PATH + "updatepassword", {
		oldPassword: await oldHashedPasswordPromise,
		newPassword: await newHashedPasswordPromise
	});


	let messageEelement = newPasswordRepeatField.insertError("Password updated succesfully");
	messageEelement.classList.add(OK_MESSAGE_CLASS);
	newPasswordRepeatField.okBorder();
	newPasswordField.okBorder();
}

async function handleUpdatePasswordError(error) {
	updatePasswordFieldsContainer.disable(false);
	savePasswordButton.disabled = false;
	if (error.json == undefined) throw error;

	if (error.httpStatus == 401) {
		oldPasswordField.insertError("Invalid password");
		return false;
	} else {
		throw error;
	}
}

savePasswordButton.addEventListener('click', (e) => {
	updatePassword().catch(handleUpdatePasswordError).catch(handleFatalError);
});










async function deleteUser() {
	if (!confirm("Are you sure you want to delete this account?")) return false;

	const jsonResponse = await makeJSONDeleteRequest(BASE_SUBMIT_PATH + "delete");
	window.location.href = getRedirectUrlFromParam(jsonResponse.url);
}

const deleteButton = document.getElementById("deleteButton");
deleteButton.addEventListener("click", (e) => {
	deleteUser().catch(handleFatalError);
});



document.getElementById("logoutButton").addEventListener("click", (e) => {
	location.href = "/logout";
});
