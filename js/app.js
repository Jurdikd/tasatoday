import { calcualteTodayTerror } from "./calcualteTodayTerror.js"; // Import calcualteTodayTerror (funtions) for to calculate
import { loadingTerror } from "./loadingTerror.js"; // This is while the page it's loading everething

// Load
document.addEventListener("DOMContentLoaded", () => {
	showRates();
	localStorage.setItem("divisa", "usd");
	tittleDivisa.innerText = "BS a USD";
	setTimeout(() => {
		loadingTerror.load(document.getElementById("preloader"));
	}, 4500);
});

// inputs
const amount = document.getElementById("amount"); // cantidad
const result = document.getElementById("result"); // resultado
// labels
const labelAmount = document.getElementsByClassName("labelAmount"); // etiqueta cantidad
const labelResult = document.getElementsByClassName("labelResult"); // etiqueta resultado
// buttons
const changeDivisa = document.getElementById("changeDivisa");
const tittleDivisa = document.getElementsByClassName("tittleDivisa");

// Automatic convert
amount.addEventListener("keyup", (e) => {
	//console.log(e.target.value);
	if (e.target.value < 0) {
		e.target.value = 0;
	}
	calculateEvent();
});
amount.addEventListener("change", (e) => {
	//console.log(e.target.value);
	if (e.target.value < 0) {
		e.target.value = 0;
	}
	calculateEvent();
});
// Convert divisa with a click on change
changeDivisa.addEventListener("click", (e) => {
	const rates = {
		rates: 2,
	};
	if (localStorage.getItem("divisa") === "usd") {
		localStorage.setItem("divisa", "eur");
		e.target.text = "Cambiar a BsD";
		calcualteTodayTerror.bcv_BS_to_bsd(rates);
	} else {
		localStorage.setItem("divisa", "usd");
		e.target.text = "Cambiar a USD";
		calcualteTodayTerror.bcv_BS_to_bsd(rates);
	}
	console.log(e.target.text);
});

const calculateEvent = () => {
	if (localStorage.getItem("divisa") === "usd") {
		tittleDivisa.innerText = "BsD a USD";
		// Convertir bs a usd
		calcualteTodayTerror.enparalelovzla_to_bsd();
	} else if (localStorage.getItem("divisa") === "eur") {
		// Convertir bs a eur
		tittleDivisa.innerText = "USD a BsD";
		calcualteTodayTerror.bsd_to_enparalelovzla();
	}
};
const tasatodayRate = document.querySelector(".tasatoday-rate");
const enparaleloRate = document.querySelector(".enparalelo-rate");
const airtmRate = document.querySelector(".airtm-rate");
const bcvRate = document.querySelector(".bcv-rate");
const zelleRate = document.querySelector(".zelle-rate");
const dolartodayRate = document.querySelector(".dolartoday-rate");
const reserveRate = document.querySelector(".reserve-rate");
const showRates = async () => {
	const allRates = await calcualteTodayTerror.fetchDivisa({ rates: "rates" });

	tasatodayRate.innerText = allRates.tasatoday.rate;
	bcvRate.innerText = allRates.bcv.rate;
	enparaleloRate.innerText = allRates.enparalelovzla.rate;
	airtmRate.innerText = allRates.airtm.rate;
	zelleRate.innerText = allRates.zelle.rate;
	dolartodayRate.innerText = allRates.dolartoday.rate;
	reserveRate.innerText = allRates.reserve.rate;
};
