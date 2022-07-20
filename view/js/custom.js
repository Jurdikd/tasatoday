//import { calcualteTodayTerror } from "./calcualteTodayTerror.js"; // Import calcualteTodayTerror (funtions) for to calculate
import { loadRatesTerror } from "./loadRatesTerror.js"; // This is for load or set rates
import { TerrorMoney } from "./TerrorMoney.js"; // This is for to format currencys
import { urlGetTerror } from "./urlGetTerror.js"; // This is for get url
import { loadingTerror } from "./loadingTerror.js"; // This is while the page it's loading everething
// Load page
document.addEventListener("DOMContentLoaded", async () => {
	// set values
	loadRatesTerror.loadDefault();
	// Loader message
	await loadingTerror.message(document.getElementById("msgPreloader"));
	// Loader
	loadingTerror.load(document.getElementById("preloader"), 5000);
	//await showRates();
	await dataLoad();
	await loadCalculator();
});
// Data get url
const rate = urlGetTerror.get("rate");
const currency = urlGetTerror.get("currency");
const to = urlGetTerror.get("to");
const nameRate = urlGetTerror.get("name");

// Load calculator
const loadCalculator = async () => {
	const calculator = document.querySelector(".card-calculator");
	const template = document.getElementById("card-calculator").content;
	const fragment = document.createDocumentFragment();

	const clone = template.cloneNode(true);
	clone.querySelector(".amountRate").textContent = localStorage.getItem("nameRateCustom");
	clone.querySelector(".resultRate").textContent = localStorage.getItem("toCustom");
	fragment.appendChild(clone);
	calculator.appendChild(fragment);
};

const dataLoad = async () => {
	if (
		rate !== undefined &&
		currency !== undefined &&
		to !== undefined &&
		nameRate !== undefined
	) {
		if (loadRatesTerror.verifyStorage() === true) {
			localStorage.setItem("rateCustom", rate);
			localStorage.setItem("currencyCustom", currency);
			localStorage.setItem("toCustom", to);
			localStorage.setItem("nameRateCustom", nameRate);
		}
	}
};
// Get rate with calculator
const cardCalculator = document.querySelector(".card-calculator");
cardCalculator.addEventListener("change", async (e) => {
	await calculatorProcess(e);
});
cardCalculator.addEventListener("keyup", async (e) => {
	await calculatorProcess(e);
});
const calculatorProcess = async (e) => {
	if (e.target && e.target.name === "amount") {
		const amount = e.target;
		const result =
			e.target.parentElement.parentElement.nextElementSibling.firstElementChild
				.lastElementChild;
		const btnInverter =
			e.target.parentElement.parentElement.nextElementSibling.nextElementSibling
				.firstElementChild.nextElementSibling;
		const btnShare = btnInverter.nextElementSibling;
		result.value = "";
		btnInverter.disabled = true;
		btnShare.disabled = true;
		await calculateEvent(amount, result);
		if (result.value <= 0) {
			result.value = "";
		}
		if (amount.value !== "" && amount.value > 0) {
			btnInverter.disabled = false;
			btnShare.disabled = false;
		} else {
			btnInverter.disabled = true;
			btnShare.disabled = true;
		}
	}
};
//Btn inverter
cardCalculator.addEventListener("click", async (e) => {
	if (e.target && e.target.name === "rateInverter") {
		btnInverter(e);
	} else if (e.target && e.target.name === "shareRate") {
		btnShareWs(e);
	}
});
const btnInverter = async (e) => {
	if (e.target && e.target.name === "rateInverter") {
		const namesLabels = e.target.parentElement.parentElement;
		const amountLabel = namesLabels.querySelector(".amountRate");
		const resultLabel = namesLabels.querySelector(".resultRate");

		if (localStorage.getItem("currencyCustom") === currency) {
			localStorage.setItem("currencyCustom", to);
			// change la labels
			let amountText = amountLabel.textContent;
			let resultText = resultLabel.textContent;
			amountLabel.textContent = resultText;
			resultLabel.textContent = amountText;
			const amount =
				e.target.parentElement.parentElement.firstElementChild.lastElementChild
					.lastElementChild;
			const result =
				e.target.parentElement.previousElementSibling.firstElementChild.firstElementChild
					.nextElementSibling;

			let oldResult = result.value;
			let oldAmount = amount.value;
			amount.value = oldResult;
			result.value = oldAmount;
			// preReload
			let textPreload = e.target.textContent;
			e.target.disabled = true;
			e.target.textContent = "...";
			const btnShare = e.target.nextElementSibling;
			btnShare.disabled = true;
			// Reload rate
			await calculateEvent(amount, result);
			e.target.disabled = false;
			e.target.textContent = textPreload;
			btnShare.disabled = false;
		} else if (localStorage.getItem("currencyCustom") === to) {
			localStorage.setItem("currencyCustom", currency);
			// change la labels
			let amountText = amountLabel.textContent;
			let resultText = resultLabel.textContent;
			amountLabel.textContent = resultText;
			resultLabel.textContent = amountText;
			const amount =
				e.target.parentElement.parentElement.firstElementChild.lastElementChild
					.lastElementChild;
			const result =
				e.target.parentElement.previousElementSibling.firstElementChild.firstElementChild
					.nextElementSibling;

			let oldResult = result.value;
			let oldAmount = amount.value;
			amount.value = oldResult;
			result.value = oldAmount;
			// preReload
			let textPreload = e.target.textContent;
			e.target.disabled = true;
			e.target.textContent = "...";
			const btnShare = e.target.nextElementSibling;
			btnShare.disabled = true;
			// Reload rate
			await calculateEvent(amount, result);
			e.target.disabled = false;
			e.target.textContent = textPreload;
			btnShare.disabled = false;
			{
			}
		}
	}
};
const btnShareWs = async (e) => {
	if (e.target && e.target.name === "shareRate") {
		//console.log(e.target);
		const result =
			e.target.parentElement.previousElementSibling.firstElementChild.firstElementChild
				.nextElementSibling;
		const message =
			"El monto es: " +
			result.value +
			" valor tasa: " +
			localStorage.getItem("rateCustom") +
			" de " +
			localStorage.getItem("nameRateCustom").replace(" ", "%20");
		window.open("https://wa.me/?text=" + message, "_blank");
	}
};
// Caculates
const calculateEvent = async (amount, result) => {
	if (amount.value < 0) {
		amount.value = 0;
	} else {
		if (localStorage.getItem("currencyCustom") === currency) {
			result.value = await calculateConvert(
				localStorage.getItem("rateCustom"),
				"/",
				amount.value
			);
		} else if (localStorage.getItem("currencyCustom") === to) {
			// Convertir bs a eur
			result.value = await calculateConvert(
				localStorage.getItem("rateCustom"),
				"*",
				amount.value
			);
		}
	}
};
// Calocate and converter
const calculateConvert = async (rate, mate, amount) => {
	if (mate === "+") {
		return (amount + rate).toFixed(2);
	} else if (mate === "-") {
		return (amount - rate).toFixed(2);
	} else if (mate === "*") {
		return (amount * rate).toFixed(2);
	} else if (mate === "/") {
		return (amount / rate).toFixed(2);
	}
};
