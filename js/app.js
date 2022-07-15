import { calcualteTodayTerror } from "./calcualteTodayTerror.js"; // Import calcualteTodayTerror (funtions) for to calculate
import { loadingTerror } from "./loadingTerror.js"; // This is while the page it's loading everething

// Load
document.addEventListener("DOMContentLoaded", () => {
	showRates();
	localStorage.setItem("divisa", "usd");
	tittleDivisa.textContent = "BS a USD";
	// Loader and message
	loadingTerror.message(document.getElementById("msgPreloader"));
	loadingTerror.load(document.getElementById("preloader"), 5000);
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

const calculateEvent = async () => {
	if (localStorage.getItem("divisa") === "usd") {
		tittleDivisa.textContent = "BsD a USD";
		result.value = await calcualteTodayTerror.covert("enparalelovzla", "/", amount.value);
	} else if (localStorage.getItem("divisa") === "eur") {
		// Convertir bs a eur
		tittleDivisa.textContent = "USD a BsD";
		result.value = await calcualteTodayTerror.covert("enparalelovzla", "*", amount.value);
	}
};

const showRates = async () => {
	const rates = document.querySelector(".rates");
	const template = document.getElementById("card-rate").content;
	const fragment = document.createDocumentFragment();
	const allRates = await calcualteTodayTerror.fetchDivisa({ rates: "rates" });

	//set rate
	for (let clave in allRates) {
		//console.log(allRates[clave].rate);
		const clone = template.cloneNode(true);
		clone.querySelector(".tasatoday-rate").textContent = allRates[clave].rate;
		clone.querySelector(".card-tittle").textContent = allRates[clave].name;

		fragment.appendChild(clone);
	}
	await actionAsync();
	rates.innerHTML = "";
	rates.appendChild(fragment);
};
const actionAsync = async () => {
	return new Promise((resolve, reject) => {
		setTimeout(() => {
			resolve();
		}, 7000);
	});
};
