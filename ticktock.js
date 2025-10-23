(() => {
	let displayHex = false;
	let previousSecond = 0;

	const $ = (id) => document.getElementById(id);

	const normalise = (scalar, maxValue, divisions) =>
		Math.floor(parseFloat(scalar, 10) * maxValue / divisions);

	const stringify = (number, hexOutput = false) => {
		const num = ~~number;
		if (hexOutput) {
			return num.toString(16).padStart(2, '0');
		}
		return num.toString().padStart(2, '0');
	};

	const getBackgroundColor = (h, m, s) => {
		const normH = normalise(h, 255, 24);
		const normM = normalise(m, 255, 60);
		const normS = normalise(s, 255, 60);
		return `rgb(${normH},${normM},${normS})`;
	};

	const flash = () => {
		const colons = document.querySelectorAll('.colon');
		colons.forEach(colon => {
			colon.style.visibility = colon.style.visibility === 'hidden' ? 'visible' : 'hidden';
		});
	};

	const tick = () => {
		const time = new Date();
		const s = time.getSeconds();
		const m = time.getMinutes();
		const h = time.getHours();

		const hours = $('hours');
		const minutes = $('minutes');
		const seconds = $('seconds');

		if (displayHex) {
			hours.textContent = stringify(normalise(h, 255, 24), true);
			minutes.textContent = stringify(normalise(m, 255, 60), true);
			seconds.textContent = stringify(normalise(s, 255, 60), true);
		} else {
			hours.textContent = stringify(h);
			minutes.textContent = stringify(m);
			seconds.textContent = stringify(s);
		}

		if (s !== previousSecond) {
			flash();
			previousSecond = s;
		}

		document.body.style.backgroundColor = getBackgroundColor(h, m, s);
	};

	const init = () => {
		// Remove "need JavaScript" message
		const message = $('message');
		if (message) {
			message.remove();
		}

		// Toggle between hex and normal time display on click
		document.addEventListener('click', () => {
			displayHex = !displayHex;
			tick(); // Update immediately
		}, { passive: true });

		// Initial tick and set up interval
		tick();
		setInterval(tick, 1000);
	};

	// Start when DOM is ready
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();
