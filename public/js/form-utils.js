"use strict";
class FormDataRestorer {
	key;
	formObject;
	storage;

	constructor(key, formObject, storage = sessionStorage) {
		this.key = key;
		this.formObject = formObject;
		this.storage = storage;
	}

	restore(wipe = true) {
		const formData = this.storage.getItem(this.key);
		if (formData === null) return false;
		if (wipe) this.storage.removeItem(this.key);

		const formJson = JSON.parse(formData);

		for (const [label, field] of Object.entries(this.formObject)) {
			field.value = formJson[label] ?? "";
		}

		return true;
	}

	save() {
		let formData = {};
		for (const [label, field] of Object.entries(this.formObject)) {
			formData[label] = field.value;
		}
		this.storage.setItem(this.key, JSON.stringify(formData));
	}
}
