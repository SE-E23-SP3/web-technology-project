class ErrorContainerUtil {
	static get HIDDEN_CLASS() {
		return "hidden";
	}


	contentElements;
	errorElement;
	errorMessage;

	constructor() {
		this.errorElement = document.querySelector(`.${ErrorContainerUtil.HIDDEN_CLASS}.error-container`);
		this.errorMessage = this.errorElement.querySelector(".error-message");
		this.contentElements = document.querySelectorAll("article.main-content");
	}

	displayError() {
		this.contentElements.forEach((node) => {
			node.classList.add(ErrorContainerUtil.HIDDEN_CLASS);
		});

		this.errorElement.classList.remove(ErrorContainerUtil.HIDDEN_CLASS);
	}

	setMessage(message) {
		this.errorMessage.innerText = "message";
	}
}

document.getElementById("pageRefreshBtn").addEventListener('click', (e) => {
	location.reload();
});

const errorContainerUtil = new ErrorContainerUtil();



function handleFatalError(error) {
	errorContainerUtil.displayError();
	console.error(error.json ?? error);
}
