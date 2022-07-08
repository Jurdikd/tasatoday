export const calcualteTodayTerror = {
	// Fetch for to consult
	fetchDivisa: async (rates) => {
		try {
			const res = await fetch("app/ajax/divisa.ajax.php", {
				method: "POST",
				headers: {
					Accept: "application/json",
					"Content-Type": "application/json",
				},
				body: JSON.stringify(rates),
			});
			const data = await res.json();
			console.log(data);
			return data;
		} catch (error) {
			console.log(error);
		}
	},
	//Convert Bcv to USD
	bcv_to_usd: async (rates) => {
		const rate = await calcualteTodayTerror.fetchDivisa(rates);
		//console.log(rate);
		let convertion = amount.value / rate.bcv.tasa;
		result.value = convertion.toFixed(2);
	},
	// Convert usd to bcv
	usd_to_bcv: async (rates) => {
		const rate = await calcualteTodayTerror.fetchDivisa(rates);
		//console.log(rate);
		let convertion = amount.value / rate.bcv.tasa;
		result.value = convertion.toFixed(2);
	},
	// Convert enparalelo to usd
	enparalelo_to_usd: async (rates) => {
		const rate = await calcualteTodayTerror.fetchDivisa(rates);
		//console.log(rate);
		let convertion = amount.value * rate.enparalelo.tasa;
		result.value = convertion.toFixed(2);
	},
	// Convert usd to enparalelo
	usd_to_enparalelo: async (rates) => {
		const rate = await calcualteTodayTerror.fetchDivisa(rates);
		//console.log(rate);
		let convertion = amount.value / rate.enparalelo.tasa;
		result.value = convertion.toFixed(2);
	},
	// Convert airtm to usd
	airtm_to_usd: async (rates) => {
		const rate = await calcualteTodayTerror.fetchDivisa(rates);
		//console.log(rate);
		let convertion = amount.value * rate.airtm.tasa;
		result.value = convertion.toFixed(2);
	},
	// Convert usd to airtm
	usd_to_airtm: async (rates) => {
		const rate = await calcualteTodayTerror.fetchDivisa(rates);
		//console.log(rate);
		let convertion = amount.value / rate.airtm.tasa;
		result.value = convertion.toFixed(2);
	},
	// Convert zelle to usd
	zelle_to_usd: async (rates) => {
		const rate = await calcualteTodayTerror.fetchDivisa(rates);
		//console.log(rate);
		let convertion = amount.value * rate.zelle.tasa;
		result.value = convertion.toFixed(2);
	},
	// Convert usd to zelle
	usd_to_zelle: async (rates) => {
		const rate = await calcualteTodayTerror.fetchDivisa(rates);
		//console.log(rate);
		let convertion = amount.value / rate.zelle.tasa;
		result.value = convertion.toFixed(2);
	},
};
