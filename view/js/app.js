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

rateCreateContent.addEventListener("change", async (e) => {
	e.stopPropagation();
	await createNameRate(e);
	await createValueRate(e);
});
const createNameRate = async (e) => {
	if (e.target && e.target.name === "nameCreate") {
		console.log(e, e.target);
		const nameCreate = e.target;
	}
};
const createValueRate = async (e) => {
	if (e.target && e.target.name === "rateCreate") {
		console.log(e, e.target);
		const rateCreate = e.target;
	}
};
