// Import calcualteTodayTerror (funtions) for to calculate
import { calcualteTodayTerror } from "./calcualteTodayTerror.js";
import { contactsMobile } from "./contacts.js";

// Load
document.addEventListener("DOMContentLoaded", () => {
	showRates();
	localStorage.setItem("divisa", "usd");
	tittleDivisa.innerText = "BS a USD";
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
		calcualteTodayTerror.bcv_BS_to_USD(rates);
	} else {
		localStorage.setItem("divisa", "usd");
		e.target.text = "Cambiar a USD";
		calcualteTodayTerror.bcv_BS_to_USD(rates);
	}
	console.log(e.target.text);
});

const calculateEvent = () => {
	const rates = {
		rates: "enparalelovzla",
	};

	if (localStorage.getItem("divisa") === "usd") {
		tittleDivisa.innerText = "BsD a USD";
		// Convertir bs a usd
		calcualteTodayTerror.enparalelovzla_to_usd(rates);
	} else if (localStorage.getItem("divisa") === "eur") {
		// Convertir bs a eur
		tittleDivisa.innerText = "USD a BsD";
		calcualteTodayTerror.usd_to_enparalelovzla(rates);
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
	const rates = {
		rates: "rates",
	};
	const allRates = await calcualteTodayTerror.fetchDivisa(rates);

	tasatodayRate.innerText = allRates.tasatoday.rate;
	bcvRate.innerText = allRates.bcv.rate;
	enparaleloRate.innerText = allRates.enparalelovzla.rate;
	airtmRate.innerText = allRates.airtm.rate;
	zelleRate.innerText = allRates.zelle.rate;
	dolartodayRate.innerText = allRates.dolartoday.rate;
	reserveRate.innerText = allRates.reserve.rate;
};
