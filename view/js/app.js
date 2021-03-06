/* app */
import { loadingTerror } from "./loadingTerror.js"; // This is while the page it's loading everething

// Load page
document.addEventListener("DOMContentLoaded", async () => {
	// Loader message
	await loadingTerror.message(document.getElementById("msgPreloader"));
	// Loader
	loadingTerror.load(document.getElementById("preloader"), 5000);
});

const rateCreateContent = document.querySelector(".offcanvas-body");
const CreateLinkRate = document.querySelector(".CreateLinkRate");
rateCreateContent.addEventListener("change", (e) => {
	e.stopPropagation();
	createNameRate(e);
	createValueRate(e);
});
rateCreateContent.addEventListener("keyup", (e) => {
	e.stopPropagation();
	createNameRate(e);
	createValueRate(e);
});

const createNameRate = (e) => {
	if (e.target && e.target.name === "nameCreate") {
		const nameCreate = e.target;
		//console.log(window.origin);
		nameCreate.value = nameCreate.value.replace(/[\/\\&]/g, "");
		let regex = /name=[^&]*/g;
		let change = CreateLinkRate.textContent.replace(
			regex,
			"name=" + nameCreate.value.replace(/[\/\\&]/g, "")
		);
		CreateLinkRate.textContent = change.replace(" ", "%20");
	}
};
const createValueRate = (e) => {
	if (e.target && e.target.name === "rateCreate") {
		const rateCreate = e.target;
		if (rateCreate.value <= 0) {
			rateCreate.value = "";
		} else {
			let regex = /rate=[0-9\.,]*&/;
			let change = CreateLinkRate.textContent.replace(
				regex,
				"rate=" + rateCreate.value.replace(/[\/\\&\s+]/g, "") + "&"
			);
			//rateCreate.value = rateCreate.value.replace(/[\/\\&a-zA-Z\s+\*\-\+]/g, "");
			CreateLinkRate.textContent = change.replace(" ", "");
		}
	}
};
