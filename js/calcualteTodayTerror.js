/**
 * Get this rates:
 * promedio,
 * bcv,
 * enparalelovzla,
 * airtm,
 * localbitcoins,
 * reserve,
 * dolartoday,
 * monedero-skrill,
 * monedero-amazon,
 * remesas-zoom,
 * yadio,
 * banco-citibank,
 * zelle,
 * petro,
 * euro,
 * yuan,
 * lira,
 * rublo
 * */
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
			//console.log(data);
			return data;
		} catch (error) {
			console.log(error);
		}
	},
	//Convert
	covert: async (rates, mate, amount) => {
		const getRate = await calcualteTodayTerror.fetchDivisa({ rates: rates });
		if (mate === "+") {
			return (amount + getRate[rates].rate).toFixed(2);
		} else if (mate === "-") {
			return (amount - getRate[rates].rate).toFixed(2);
		} else if (mate === "*") {
			return (amount * getRate[rates].rate).toFixed(2);
		} else if (mate === "/") {
			return (amount / getRate[rates].rate).toFixed(2);
		}
	} /*
	//Convert promedio to USD
	tasatoday_to_bsd: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "tasatoday" });
		//console.log(rate);
		let convertion = amount.value / rate.tasatoday.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert usd to promedio
	bsd_to_tasatoday: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "tasatoday" });
		//console.log(rate);
		let convertion = amount.value * rate.tasatoday.rate;
		result.value = convertion.toFixed(2);
	},
	//Convert bcv to USD
	bcv_to_bsd: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "bcv" });
		//console.log(rate);
		let convertion = amount.value / rate.bcv.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert usd to bcv
	bsd_to_bcv: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "bcv" });
		//console.log(rate);
		let convertion = amount.value * rate.bcv.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert enparalelovzla to usd
	enparalelovzla_to_bsd: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "enparalelovzla" });
		//console.log(rate);
		let convertion = amount.value / rate.enparalelovzla.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert usd to enparalelovzla
	bsd_to_enparalelovzla: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "enparalelovzla" });
		//console.log(rate);
		let convertion = amount.value * rate.enparalelovzla.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert airtm to usd
	airtm_to_bsd: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "airtm" });
		//console.log(rate);
		let convertion = amount.value / rate.airtm.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert usd to airtm
	bsd_to_airtm: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "airtm" });
		//console.log(rate);
		let convertion = amount.value * rate.airtm.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert localbitcoins to usd
	localbitcoins_to_bsd: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "localbitcoins" });
		//console.log(rate);
		let convertion = amount.value / rate.localbitcoins.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert usd to localbitcoins
	bsd_to_localbitcoins: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "localbitcoins" });
		//console.log(rate);
		let convertion = amount.value * rate.localbitcoins.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert reserve to usd
	reserve_to_bsd: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "reserve" });
		//console.log(rate);
		let convertion = amount.value / rate.reserve.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert usd to reserve
	bsd_to_reserve: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "reserve" });
		//console.log(rate);
		let convertion = amount.value * rate.reserve.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert dolartoday to usd
	dolartoday_to_bsd: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "dolartoday" });
		//console.log(rate);
		let convertion = amount.value / rate.dolartoday.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert usd to dolartoday
	bsd_to_dolartoday: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "dolartoday" });
		//console.log(rate);
		let convertion = amount.value * rate.dolartoday.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert skrill to usd
	skrill_to_bsd: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "skrill" });
		//console.log(rate);
		let convertion = amount.value / rate.skrill.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert usd to skrill
	bsd_to_skrill: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "skrill" });
		//console.log(rate);
		let convertion = amount.value * rate.skrill.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert amazon to usd
	amazon_to_bsd: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "amazon" });
		//console.log(rate);
		let convertion = amount.value / rate.amazon.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert usd to amazon
	bsd_to_amazon: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "amazon" });
		//console.log(rate);
		let convertion = amount.value * rate.amazon.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert zoom to usd
	zoom_to_bsd: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "zoom" });
		//console.log(rate);
		let convertion = amount.value / rate.zoom.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert usd to zoom
	bsd_to_zoom: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "zoom" });
		//console.log(rate);
		let convertion = amount.value * rate.zoom.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert yadio to usd
	yadio_to_bsd: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "yadio" });
		//console.log(rate);
		let convertion = amount.value / rate.yadio.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert usd to yadio
	bsd_to_yadio: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "yadio" });
		//console.log(rate);
		let convertion = amount.value * rate.yadio.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert citibank to usd
	citibank_to_bsd: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "citibank" });
		//console.log(rate);
		let convertion = amount.value / rate.citibank.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert usd to citibank
	bsd_to_citibank: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "citibank" });
		//console.log(rate);
		let convertion = amount.value * rate.citibank.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert zelle to usd
	zelle_to_bsd: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "zelle" });
		//console.log(rate);
		let convertion = amount.value / rate.zelle.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert usd to zelle
	bsd_to_zelle: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "zelle" });
		//console.log(rate);
		let convertion = amount.value * rate.zelle.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert petro to usd
	petro_to_bsd: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "petro" });
		//console.log(rate);
		let convertion = amount.value / rate.petro.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert usd to petro
	bsd_to_petro: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "petro" });
		//console.log(rate);
		let convertion = amount.value * rate.petro.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert euro to usd
	euro_to_bsd: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "euro" });
		//console.log(rate);
		let convertion = amount.value / rate.euro.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert usd to euro
	bsd_to_euro: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "euro" });
		//console.log(rate);
		let convertion = amount.value * rate.euro.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert yuan to usd
	yuan_to_bsd: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "yuan" });
		//console.log(rate);
		let convertion = amount.value / rate.yuan.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert usd to yuan
	bsd_to_yuan: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "yuan" });
		//console.log(rate);
		let convertion = amount.value * rate.yuan.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert lira to usd
	lira_to_bsd: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "lira" });
		//console.log(rate);
		let convertion = amount.value / rate.lira.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert usd to lira
	bsd_to_lira: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "lira" });
		//console.log(rate);
		let convertion = amount.value * rate.lira.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert rublo to usd
	rublo_to_bsd: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "rublo" });
		//console.log(rate);
		let convertion = amount.value / rate.zelle.rate;
		result.value = convertion.toFixed(2);
	},
	// Convert usd to rublo
	bsd_to_rublo: async () => {
		const rate = await calcualteTodayTerror.fetchDivisa({ rates: "rublo" });
		//console.log(rate);
		let convertion = amount.value * rate.rublo.rate;
		result.value = convertion.toFixed(2);
	},*/,
};
