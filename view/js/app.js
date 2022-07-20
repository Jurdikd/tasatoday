/* app */
import { loadingTerror } from "./loadingTerror.js"; // This is while the page it's loading everething

// Load page
document.addEventListener("DOMContentLoaded", async () => {
	// Loader message
	await loadingTerror.message(document.getElementById("msgPreloader"));
	// Loader
	loadingTerror.load(document.getElementById("preloader"), 5000);
});
