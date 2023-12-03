"use strict";
function getMetaValueByName(name) {
	const metaElements = Array.from(document.getElementsByTagName('meta'));
	const matchedMeta =  metaElements.find((item) => {
		return item.getAttribute('name') === name;
	});

	if (matchedMeta === undefined) throw new Error(`Metatag "${name}" not found!`);

	return matchedMeta.getAttribute('content');
}


class ErrorWithJson extends Error {

	#json;
	get json() { return this.#json; }

	constructor(message = "", json = null, ...args) {
		super(message, ...args);
		this.#json = json;
	}
}



const CSRF_TOKEN = getMetaValueByName('csrf-token');


async function makeJSONPostRequest(url, jsonBody, customHeaders) {
	const defaultHeaders = {
			"Content-Type": "application/json",
			"X-CSRF-TOKEN": CSRF_TOKEN,
			"Accept": "application/json"
		};

	const headers = {...defaultHeaders, ...customHeaders};

	const fetchOptions = {
		method: "POST",
		credentials: "same-origin",
		headers: headers,
		body: JSON.stringify(jsonBody)
	}

	const response = await fetch(url, fetchOptions);

	if (!response.ok) {
		const errorMessage = "Got error: " + response.status;
		let error;
		try {
			const json = await response.json();
			error = new ErrorWithJson(errorMessage, json);
		} catch (error) {
			console.error("Failed to json parse response", error);
			error = new Error(errorMessage);
		}

		error.httpStatus = response.status;
		throw error;
		return;
	}

	// console.log(await response.text());
	return await response.json();
}




function getRedirectUrlFromParam(defaultUrl = null, url = location, key = "redirect") {
	const param = new URLSearchParams(url.search);
	if (param.has(key)) return param.get(key);
	if (defaultUrl === null) return url.href;
	return defaultUrl;
}
