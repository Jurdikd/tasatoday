export const urlGetTerror = {
	get: (param) => {
		const urlSearchParams = new URLSearchParams(window.location.search);
		const params = Object.fromEntries(urlSearchParams.entries());
		if (params.length === 0) {
			return undefined;
		} else {
			if (params.param === undefined) {
				return undefined;
			} else {
				return params.param;
			}
		}
	},
};
