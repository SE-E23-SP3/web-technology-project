"use strict";

class FieldsContainer {
	fields;

	constructor(fields = {}) {
		this.fields = fields;
	}

	check() {
		return Object.values(this.fields).every(f => {
			return f.check();
		})
	}

	disable(state) {
		Object.values(this.fields).forEach((field) => {
			field.disabled = state;
		});
	}
}
