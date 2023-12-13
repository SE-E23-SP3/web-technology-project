"use strict";
function disableFields(fields, state) {
	fields.forEach((field) => {
		field.disabled = state;
	});
}
class InputValidator {
	static get patterns(){
		//create constant static property for InputValidator
		return {
			"password": {
				"pattern": /^.{12,}$/,
				"min": 12,
				"max": null,
				"invalidCharMessage": ""
			},
			"name": {
				"pattern": /^[^\\<>?!=%#"^&$@\/\n\t]{2,50}$/,
				"min": 2,
				"max": 50,
				"invalidCharMessage": "The following characters are invalid: \\ < > ? ! = % # \" ^ & $ @ /"
			},
			"username": {
				"pattern": /^[A-Za-z0-9_-]{4,20}$/,
				"min": 4,
				"max": 20,
				"invalidCharMessage": "Only the following characters are allowed: A-Z 0-9 _ -"
			},
			"phone": {
				"pattern": /^(\+45)? ?(\d{2} ?){4}$/,
				"min": 8,
				"max": null,
				"invalidCharMessage": "Invalid phone number"
			},
			"zipCode": {
				"pattern": /^\d{4}$/,
				"min": 4,
				"max": 4,
				"invalidCharMessage": "Invalid zip code"
			},
			"email": {
				"pattern": /^\b[A-Za-z0-9._%+-]{1,90}@[A-Za-z0-9.-]{1,90}\.[A-Za-z]{2,20}\b ?$/,
				"min": 1,
				"max": null,
				"invalidCharMessage": "Invalid email"
			},
			"address": {
				"pattern": /^[^\\<>?!=%#"^&$@\/\n\t]{2,100}$/,
				"min": 2,
				"max": 100,
				"invalidCharMessage": "The following characters are invalid: \\ < > ? ! = % # \" ^ & $ @ /"
			}
		};
	}

	static validateFields(...fields) {
		return fields.every((field) => field.check());
	}


	static get OK_BORDER_CLASS() {
		return "ok-border";
	}

	static get ERROR_BORDER_CLASS() {
		return "error-border";
	}

	static get INSERTED_ERROR_CLASS() {
		return "insert-error";
	}

	static get ERROR_MESSAGE_CLASS() {
		return "error-message";
	}


	useOKBorder = true;

	constructor(type, field, extraValidator = null) {
		//https://mothereff.in/html-entities
		this.pattern = new RegExp(type["pattern"]);
		this.field = field;
		this.min = type["min"];
		this.max = type["max"];
		this.invalidCharMessage = type["invalidCharMessage"];

		let self = this; //save this object into a another variable, so it can be accessed to in the following functions.

		if (extraValidator === null) {
			this.extraValidator = function() {
				return true;
			};
		} else {
			this.extraValidator = extraValidator;
		}

		this.addEventListener('input', function() {
			self.clearError();
			new Promise(function(resolve, reject) {
				//Add debounce with promise.
				let timeout = setTimeout(function() {
					//console.log("Processing");
					self.check();
					resolve();
				}, 1000);

				function blurHandler() {
					clearTimeout(timeout);
					reject("blur");
				}

				self.addEventListener("blur", blurHandler, {"once":true});

				self.addEventListener('input', function() {
					self.removeEventListener('blur', blurHandler)
					clearTimeout(timeout);
					reject("wait");
					}, {"once":true})
				}).catch(function(err) {
					//console.log(err);
			});
		});

		this.addEventListener("focus", function() {
			self.clearError();
		});

		this.addEventListener("blur", function() {
			self.check()
		});
	}
	//https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Functions/get
	get value() {
		return this.field.value;
	}
	//https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Functions/set
	set value(val) {
		this.field.value = val;
	}

	get length() {
		return this.value.length;
	}

	get classList() {
		return this.field.classList;
	}

	get disabled() {
		return this.field.disabled;
	}

	set disabled(state) {
		this.field.disabled = state;
	}

	clearError() {
		this.classList.remove(InputValidator.ERROR_BORDER_CLASS, InputValidator.OK_BORDER_CLASS);

		let errorFields = this.field.parentElement.getElementsByClassName(InputValidator.INSERTED_ERROR_CLASS);
		while (errorFields.length > 0) {
			errorFields[0].remove();
		}
	}

	errorBorder() {
		this.classList.add(InputValidator.ERROR_BORDER_CLASS);
	}

	okBorder() {
		if (!this.useOKBorder) return;
		this.classList.add(InputValidator.OK_BORDER_CLASS);
	}

	insertError(message) {
		const errorField = document.createElement("p");
		const classList = errorField.classList;
		classList.add(InputValidator.ERROR_MESSAGE_CLASS, InputValidator.INSERTED_ERROR_CLASS);
		errorField.innerText = message;
		this.field.insertAdjacentElement("afterend", errorField);
		return errorField;
	}



	getVerbalFeedbackOnField() {
		if (this.length == 0 && this.min != null) return "This field is required!";
		if (this.length <= this.min && this.min != null) return "This input must be at least " + this.min + " characters long";
		if (this.length >= this.max && this.max != null) return "This input cannot be longer than " + this.max + " characters";
		return this.invalidCharMessage;
	}

	check() {
		this.clearError();

		if (!this.pattern.test(this.value)) {
			this.insertError(this.getVerbalFeedbackOnField());
			this.errorBorder();
			return false
		}

		if (!this.extraValidator(this)) {
			this.errorBorder();
			return false;
		}

		this.okBorder();
		return true;
	}

	addEventListener(event, func, options = undefined) {
		this.field.addEventListener(event, func, options);
	}

	removeEventListener(event, func, options = undefined) {
		this.field.removeEventListener(event, func, options);
	}
}
