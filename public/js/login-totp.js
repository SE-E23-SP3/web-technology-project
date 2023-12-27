"use strict";

const submitTotpButton = document.getElementById("submitTotpButton");

const tfaCodeField = new InputValidator(InputValidator.patterns.totpCode, document.getElementById("tfaCodeField"));
tfaCodeField.useOKBorder = false;

const submitTotpFieldContainer = new FieldsContainer({
	tfaCodeField: tfaCodeField,
});


async function submitTotp(fields) {
	console.log(fields.check());
	if (!fields.check()) return false;

	fields.disable(true);
	submitTotpButton.disabled = true;


	let response = await makeJSONPostRequest(BASE_SUBMIT_PATH + "submitTotp", {
		totpVerificationCode: fields.fields.tfaCodeField.value
	});

	window.location.href = getRedirectUrlFromParam(response.url);
}

async function handleEnableTfaError(error) {
	submitTotpFieldContainer.disable(false);
	submitTotpButton.disabled = false;
	if (error.httpStatus == 401) {
		tfaCodeField.insertError("Invalid code");
		return false;
	}


	throw error;
}

submitTotpButton.addEventListener("click", e => {
	submitTotp(submitTotpFieldContainer).catch(handleEnableTfaError).catch(handleFatalError);
});
