export const calcualteTodayTerror = {
	// Fetch for to consult
	fetchDivisa: async (verify, option) => {
		try {
			let res = "";
			if (option === true) {
				res = await fetch("backend/api_divisa.php", {
					method: "POST",
					headers: {
						Accept: "application/json",
						"Content-Type": "application/json",
					},
					body: JSON.stringify(verify),
				});
				const data = await res.json();
				//console.log(data);
				return data;
			} else if (option === false) {
				res = await fetch("https://s3.amazonaws.com/dolartoday/data.json");
				const datos = await res.json();
				const data = {
					date: {
						dia: datos._timestamp.dia,
						fecha: datos._timestamp.fecha,
					},
					eur: {
						tasa: datos.EUR.sicad2,
						tasa2: datos.EUR.sicad1,
						promedio: datos.EUR.promedio_real,
					},
					usd: {
						tasa: datos.USD.sicad2,
						tasa2: datos.USD.sicad1,
						promedio: datos.USD.promedio_real,
					},
				};
				//console.log(data);

				return data;
			}
		} catch (error) {
			console.log(error);
		}
	},
	//Convert Bs to USD
	convert_BS_to_USD: async (verify, option) => {
		const datos = await calcualteTodayTerror.fetchDivisa(verify, option);
		//console.log(datos);
		let convertion = amount.value / datos.usd.tasa;
		result.value = convertion.toFixed(2);
	},
	// Convert Bs to EUR
	convert_BS_to_EUR: async (verify, option) => {
		const datos = await calcualteTodayTerror.fetchDivisa(verify, option);
		//console.log(datos);
		let convertion = amount.value / datos.eur.tasa;
		result.value = convertion.toFixed(2);
	},
	// Convert USD to BS
	convert_USD_to_BS: async (verify, option) => {
		const datos = await calcualteTodayTerror.fetchDivisa(verify, option);
		//console.log(datos);
		let convertion = amount.value * datos.usd.tasa;
		result.value = convertion.toFixed(2);
	},
	// Convert EUR to BS
	convert_EUR_to_BS: async (verify, option) => {
		const datos = await calcualteTodayTerror.fetchDivisa(verify, option);
		//console.log(datos);
		let convertion = amount.value * datos.eur.tasa;
		result.value = convertion.toFixed(2);
	},
};
