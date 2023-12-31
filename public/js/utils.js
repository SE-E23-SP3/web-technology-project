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


async function genericJSONRequest(url, type = "POST", jsonBody = {}, customHeaders = {}) {
	const defaultHeaders = {
			"Content-Type": "application/json",
			"X-CSRF-TOKEN": CSRF_TOKEN,
			"Accept": "application/json"
		};

	const headers = {...defaultHeaders, ...customHeaders};

	const fetchOptions = {
		method: type,
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

async function makeJSONPostRequest(url, jsonBody, customHeaders = {}) {
	return genericJSONRequest(url, "POST", jsonBody, customHeaders);
}

async function makeJSONDeleteRequest(url, jsonBody, customHeaders = {}) {
	return genericJSONRequest(url, "DELETE", jsonBody, customHeaders);
}

async function makeJSONPutRequest(url, jsonBody, customHeaders = {}) {
	return genericJSONRequest(url, "PUT", jsonBody, customHeaders);
}



function getRedirectUrlFromParam(defaultUrl = null, url = location, key = "redirect", forceHTTPS = true) {
	const param = new URLSearchParams(url.search);
	let returnUrl;
	if (param.has(key)) {
		returnUrl = new URL(param.get(key));
	} else if (defaultUrl === null) {
		returnUrl = url;
	} else {
		returnUrl = new URL(defaultUrl);
	}

	if (forceHTTPS) {
		returnUrl.protocol = "https:";
	}

	return returnUrl.href;
}
