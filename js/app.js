import { calcualteTodayTerror } from "./calcualteTodayTerror.js"; // Import calcualteTodayTerror (funtions) for to calculate
import { loadRatesTerror } from "./loadRatesTerror.js"; // This is for load or set rates
import { loadingTerror } from "./loadingTerror.js"; // This is while the page it's loading everething

// Load
document.addEventListener("DOMContentLoaded", async () => {
	loadRatesTerror.loadDefault();
	loadCalculator();
	showRates();
	// Loader and message
	loadingTerror.message(document.getElementById("msgPreloader"));
	loadingTerror.load(document.getElementById("preloader"), 5000);
});

// inputs
//const amount = document.getElementById("amount"); // cantidad
//const result = document.getElementById("result"); // resultado
// labels
/*
const labelAmount = document.getElementsByClassName("labelAmount"); // etiqueta cantidad
const labelResult = document.getElementsByClassName("labelResult"); // etiqueta resultado
// buttons
const changeDivisa = document.getElementById("changeDivisa");
const tittleDivisa = document.getElementsByClassName("tittleDivisa");*/
/*
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
*/

const showRates = async () => {
	const rates = document.querySelector(".rates");
	const template = document.getElementById("card-rate").content;
	const fragment = document.createDocumentFragment();
	const allRates = await calcualteTodayTerror.fetchDivisa({ rates: "rates" });

	//set rate
	for (let key in allRates) {
		//console.log(allRates[key].rate);
		const clone = template.cloneNode(true);
		clone.querySelector(".tasatoday-rate").textContent = allRates[key].rate;
		clone.querySelector(".card-tittle").textContent = allRates[key].name;
		clone
			.querySelector(".btn-setRate")
			.setAttribute("data-setRate", allRates[key].shortName);
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
document.querySelector(".rates").addEventListener("click", (e) => {
	if (e.target && e.target.tagName === "BUTTON") {
		const setRate = e.target.getAttribute("data-setRate").toLowerCase().replace(" ", "-");
		loadRatesTerror.setRate(setRate);
		document.querySelector(".amountRate").textContent = loadRatesTerror.getRate();
		document.querySelector(".resultRate").textContent = loadRatesTerror.getCurrency();
		const amount = document.getElementById("amount");
		const result = document.getElementById("result");
		calculateEvent(amount, result);
	}
});
const loadCalculator = () => {
	const calculator = document.querySelector(".card-calculator");
	const template = document.getElementById("card-calculator").content;
	const fragment = document.createDocumentFragment();

	const clone = template.cloneNode(true);
	clone.querySelector(".amountRate").textContent = loadRatesTerror.getRate();
	clone.querySelector(".resultRate").textContent = loadRatesTerror.getCurrency();
	fragment.appendChild(clone);
	calculator.appendChild(fragment);
};
document.querySelector(".card-calculator").addEventListener("change", (e) => {
	if (e.target && e.target.name === "amount") {
		const amount = e.target;
		const result =
			e.target.parentElement.parentElement.nextElementSibling.firstElementChild
				.lastElementChild;
		//console.log(result.value);
		calculateEvent(amount, result);
	}
});
const calculateEvent = async (amount, result) => {
	if (amount.value < 0) {
		amount.value = 0;
	}
	if (loadRatesTerror.getCurrency() === "usd") {
		result.value = await calcualteTodayTerror.covert(
			loadRatesTerror.getRate(),
			"/",
			amount.value
		);
	} else if (localStorage.getItem("divisa") === "eur") {
		// Convertir bs a eur

		result.value = await calcualteTodayTerror.covert("enparalelovzla", "*", amount.value);
	}
};
