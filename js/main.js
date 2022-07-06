// Import calcualteTodayTerror (funtions) for to calculate
import { calcualteTodayTerror } from "./calcualteTodayTerror.js";

// Load
document.addEventListener("DOMContentLoaded", () => {
	localStorage.setItem("divisa", "usd");
	tittleDivisa.innerText = "BS a USD";
	const verify = {
		verify: 1,
	};
	calcualteTodayTerror.fetchDivisa(verify, false);
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
amount.addEventListener("keyup", () => {
	//console.log(e.target.value);
	calculateEvent();
});
amount.addEventListener("change", () => {
	//console.log(e.target.value);
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
		calcualteTodayTerror.convert_BS_to_EUR(verify, false);
	} else {
		localStorage.setItem("divisa", "usd");
		e.target.innerText = "Cambiar a EUR";
		calcualteTodayTerror.convert_BS_to_USD(verify, false);
	}
});

const calculateEvent = () => {
	const verify = {
		verify: 2,
	};

	if (localStorage.getItem("divisa") === "usd") {
		tittleDivisa.innerText = "BS a USD";
		// Convertir bs a usd
		calcualteTodayTerror.convert_BS_to_USD(verify, false);
	} else if (localStorage.getItem("divisa") === "eur") {
		// Convertir bs a eur
		tittleDivisa.innerText = "BS a EUR";
		calcualteTodayTerror.convert_BS_to_EUR(verify, false);
	}
};
