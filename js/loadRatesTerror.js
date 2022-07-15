export const loadRatesTerror = {
	verifyStorage: () => {
		if (typeof Storage !== "undefined") {
			return true;
		} else {
			return false;
		}
	},
	loadDefault: () => {
		if (loadRatesTerror.verifyStorage() === true) {
			if (!localStorage.getItem("rate")) {
				localStorage.setItem("rate", "bcv");
				localStorage.setItem("currency", "usd");
			}
		}
	},
	getRate: () => {
		if (loadRatesTerror.verifyStorage() === true) {
			return localStorage.getItem("rate");
		}
	},
	setRate: (rate) => {
		if (loadRatesTerror.verifyStorage() === true) {
			localStorage.setItem("rate", rate);
		}
	},
	deleteRate: () => {
		if (loadRatesTerror.verifyStorage() === true) {
			localStorage.removeItem("rate");
		}
	},
	getCurrency: () => {
		if (loadRatesTerror.verifyStorage() === true) {
			return localStorage.getItem("currency");
		}
	},
	setCurrency: (currency) => {
		if (loadRatesTerror.verifyStorage() === true) {
			localStorage.setItem("currency", currency);
		}
	},
	deleteCurrency: () => {
		if (loadRatesTerror.verifyStorage() === true) {
			localStorage.removeItem("currency");
		}
	},
};
