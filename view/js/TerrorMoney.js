export const TerrorMoney = {
	monetizar: (iso, lang, data) => {
		let simbolo = { style: "currency", currency: iso };
		let formato = new Intl.NumberFormat(lang, simbolo);
		return formato.format(data);
	},
	monetizar2: (lang, data) => {
		let formato = new Intl.NumberFormat(lang);
		return formato.format(data);
	},
};
