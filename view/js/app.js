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
rateCreateContent.addEventListener("change", async (e) => {
	e.stopPropagation();
	await createNameRate(e);
	await createValueRate(e);
});
const createNameRate = async (e) => {
	if (e.target && e.target.name === "nameCreate") {
		const nameCreate = e.target;
		console.log(window.origin);
		let change = CreateLinkRate.textContent.replace("name=", "name=" + nameCreate.value);
		console.log(change);
		CreateLinkRate.textContent = change;
	}
};
const createValueRate = async (e) => {
	if (e.target && e.target.name === "rateCreate") {
		const rateCreate = e.target;
	}
};
