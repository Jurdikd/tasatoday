document.addEventListener("DOMContentLoaded", () => {
	localStorage.setItem("divisa", "usd");
	tittleDivisa.innerText = "BS a USD";
});

// inputs

const amount = document.getElementById("amount"); // cantidad
const result = document.getElementById("result"); // resultado
// labels
const labelAmount = document.getElementsByClassName("labelAmount"); // etiqueta cantidad
const labelResult = document.getElementsByClassName("labelResult"); // etiqueta resultado
// botones

const changeDivisa = document.getElementById("changeDivisa");
const tittleDivisa = document.getElementsByClassName("tittleDivisa");

const fetchDivisa = async (verify) => {
	try {
		console.log();

		const res = await fetch("backend/api_divisa.php", {
			method: "POST",
			headers: {
				Accept: "application/json",
				"Content-Type": "application/json",
			},
			body: JSON.stringify(verify),
		});
		const data = await res.json();
		return data;
		//console.log(data);*/
	} catch (error) {
		console.log(error);
	}
};
//

// Converir automatico
amount.addEventListener("keyup", (e) => {
	//console.log(e.target.value);
	const verify = {
		verify: 2,
	};

	if (localStorage.getItem("divisa") === "usd") {
		tittleDivisa.innerText = "BS a USD";
		// Convertir bs a usd
		convert_BS_to_USD(verify);
	} else if (localStorage.getItem("divisa") === "eur") {
		// Convertir bs a eur
		tittleDivisa.innerText = "BS a EUR";
		convert_BS_to_EUR(verify);
	}
});
changeDivisa.addEventListener("click", (e) => {
	// Cambio de moneda
	//console.log(e.target.innerText);

	const verify = {
		verify: 2,
	};
	if (localStorage.getItem("divisa") === "usd") {
		localStorage.setItem("divisa", "eur");
		e.target.innerText = "Cambiar a USD";
		convert_BS_to_EUR(verify);
	} else {
		localStorage.setItem("divisa", "usd");
		e.target.innerText = "Cambiar a EUR";
		convert_BS_to_USD(verify);
	}
});

// Convertir Bs a USD
async function convert_BS_to_USD(verify) {
	const datos = await fetchDivisa(verify);
	//console.log(datos);
	let convertion = amount.value / datos.usd.tasa;
	result.value = convertion.toFixed(2);
}
// Convertir Bs a EUR
async function convert_BS_to_EUR(verify) {
	const datos = await fetchDivisa(verify);
	//console.log(datos);
	let convertion = amount.value / datos.eur.tasa;
	result.value = convertion.toFixed(2);
}
