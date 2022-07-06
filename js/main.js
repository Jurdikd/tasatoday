// Import calcualteTodayTerror (funtions) for to calculate
import { calcualteTodayTerror } from "./calcualteTodayTerror.js";

// Load
document.addEventListener("DOMContentLoaded", () => {
	localStorage.setItem("divisa", "usd");
	tittleDivisa.innerText = "BS a USD";
	calcualteTodayTerror.fetchDivisaLocalbitcoin();
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
	const verify = {
		verify: 2,
	};
	if (localStorage.getItem("divisa") === "usd") {
		localStorage.setItem("divisa", "eur");
		e.target.innerText = "Cambiar a USD";
		calcualteTodayTerror.bcv_BS_to_EUR(verify, false);
	} else {
		localStorage.setItem("divisa", "usd");
		e.target.innerText = "Cambiar a EUR";
		calcualteTodayTerror.bcv_BS_to_USD(verify, false);
	}
});

const calculateEvent = () => {
	const verify = {
		verify: 2,
	};

	if (localStorage.getItem("divisa") === "usd") {
		tittleDivisa.innerText = "BS a USD";
		// Convertir bs a usd
		calcualteTodayTerror.bcv_BS_to_USD(verify, false);
	} else if (localStorage.getItem("divisa") === "eur") {
		// Convertir bs a eur
		tittleDivisa.innerText = "BS a EUR";
		calcualteTodayTerror.bcv_BS_to_EUR(verify, false);
	}
};
