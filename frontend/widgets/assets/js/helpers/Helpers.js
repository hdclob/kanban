const Hlp = {
	fetch: (url, config = {}) => {
		const csrfParam = document.querySelector('input#csrfParam').getAttribute('value')
		const csrfToken = document.querySelector('input#csrfToken').getAttribute('value')

		if (config.hasOwnProperty('headers')) {
			config.headers['X-CSRF-Token'] = csrfToken;
		} else {
			config.headers = {'X-CSRF-Token': csrfToken};
		}
	
		if (!config.hasOwnProperty('method')) {
			config.method = 'get';
		}
	
		if (config.method == 'post') {
			if (config.hasOwnProperty('body')) {
				config.body[csrfParam] = csrfToken;
			} else {
				config.body = {csrfParam: csrfToken};
			}
			config.body = JSON.stringify(config.body);
		}
		return fetch(url, config);
	}
}

export default Hlp;