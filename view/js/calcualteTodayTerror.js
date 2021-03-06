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
			const res = await fetch("../../app/ajax/divisa.ajax.php", {
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
	},
};
