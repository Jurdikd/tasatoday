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
		amount.focus();
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
const cardCalculator = document.querySelector(".card-calculator");
cardCalculator.addEventListener("change", (e) => {
	if (e.target && e.target.name === "amount") {
		const amount = e.target;
		const result =
			e.target.parentElement.parentElement.nextElementSibling.firstElementChild
				.lastElementChild;
		//console.log(result.value);
		calculateEvent(amount, result);
		const btnShare =
			e.target.parentElement.parentElement.nextElementSibling.nextElementSibling
				.lastElementChild;
		if (amount.value !== "" && amount.value > 0) {
			btnShare.disabled = false;
		} else {
			btnShare.disabled = true;
		}
	}
});
cardCalculator.addEventListener("click", (e) => {
	if (e.target && e.target.name === "rateInverter") {
		if (loadRatesTerror.getCurrency() === "others") {
			loadRatesTerror.setCurrency("ves");
			const amount =
				e.target.parentElement.parentElement.firstElementChild.lastElementChild
					.lastElementChild;
			const result =
				e.target.parentElement.previousElementSibling.firstElementChild.firstElementChild
					.nextElementSibling;
			amount.value = result.value;
			calculateEvent(amount, result);
		} else if (loadRatesTerror.getCurrency() === "ves") {
			loadRatesTerror.setCurrency("others");
			const amount =
				e.target.parentElement.parentElement.firstElementChild.lastElementChild
					.lastElementChild;
			const result =
				e.target.parentElement.previousElementSibling.firstElementChild.firstElementChild
					.nextElementSibling;
			amount.value = result.value;
			calculateEvent(amount, result);
			{
			}
		}
	} else if (e.target && e.target.name === "shareRate") {
		//console.log(e.target);
		const result =
			e.target.parentElement.previousElementSibling.firstElementChild.firstElementChild
				.nextElementSibling;
		console.log(result.value);
		const message =
			"El monto es: " +
			result.value +
			" y tasa  " +
			loadRatesTerror.getRate().replace(" ", "%20");
		window.open("https://wa.me/?text=" + message, "_blank");
	}
});
const calculateEvent = async (amount, result) => {
	if (amount.value < 0) {
		amount.value = 0;
	} else {
		if (loadRatesTerror.getCurrency() === "others") {
			result.value = await calcualteTodayTerror.covert(
				loadRatesTerror.getRate(),
				"/",
				amount.value
			);
		} else if (loadRatesTerror.getCurrency() === "ves") {
			// Convertir bs a eur
			result.value = await calcualteTodayTerror.covert(
				loadRatesTerror.getRate(),
				"*",
				amount.value
			);
		}
	}
};
