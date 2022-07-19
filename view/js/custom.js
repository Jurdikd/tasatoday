import { calcualteTodayTerror } from "./calcualteTodayTerror.js"; // Import calcualteTodayTerror (funtions) for to calculate
import { loadRatesTerror } from "./loadRatesTerror.js"; // This is for load or set rates
import { TerrorMoney } from "./TerrorMoney.js"; // This is for to format currencys
import { loadingTerror } from "./loadingTerror.js"; // This is while the page it's loading everething
// Load page
document.addEventListener("DOMContentLoaded", async () => {
	// set values
	loadRatesTerror.loadDefault();
	// Loader message
	//await loadingTerror.message(document.getElementById("msgPreloader"));
	// Loader
	loadingTerror.load(document.getElementById("preloader"), 5000);
	//await showRates();
	//await loadCalculator();
});
