(function () {
	var	clock,
		seconds,
		minutes,
		hours,
		colons,
		previousSecond = 0,
		displayHex = false;

	if (typeof Array.prototype.map !== "function") {
		Array.prototype.map = function (callback) {
			var r = [],
				length = this.length;

			for (var i = 0; i < length; i++) {
				r.push(callback(this[i]));
			}
			return r;
		};
	}

	function $ (id) {
		return document.getElementById(id);
	}

	function normalise (scalar, maxValue, divisions) {
		return parseFloat(scalar, 10) * maxValue / divisions;
	}

	function stringify (number, hexOutput) {
		var string = "";
		number = ~~number;
		if (hexOutput === true) {
			string = number.toString(16);
			if (number < 0x10) {
				string = "0" + string;
			}
		} else {
			string = "" + number;
			if (number < 10) {
				string = "0" + number;
			}
		}
		return string;
	}

	function getBackgroundColor (h, m, s) {
		h = normalise (h, 255, 24);
		m = normalise (m, 255, 60);
		s = normalise (s, 255, 60);
		var time = [h, m, s].map (stringify);
		return "rgb(" + time.join(",") + ")";
	}

	function tick () {
		var time = new Date(),
			s = time.getSeconds (),
			m = time.getMinutes (),
			h = time.getHours ();
		// needs a bit of a tidy up here
		if (displayHex) {
			hours.innerHTML = stringify(normalise(h, 255, 24), true);
			minutes.innerHTML = stringify(normalise(m, 255, 60), true);
			seconds.innerHTML = stringify(normalise(s, 255, 60), true);
		} else {
			hours.innerHTML = stringify(h);
			minutes.innerHTML = stringify(m);
			seconds.innerHTML = stringify(s);
		}
		if (s !== previousSecond) {
			flash();
		}
		previousSecond = s;

		document.body.style.backgroundColor = getBackgroundColor (h, m, s);
	}

	function flash () {
		var len = colons.length;
		while (len--) {
			var colon = colons[len];
			if (colon.style.visibility === "hidden") {
				colon.style.visibility = "visible";
			} else {
				colon.style.visibility = "hidden";
			}
		}
	}

	function init () {
		clock = $("clock");
		seconds = $("seconds");
		minutes = $("minutes");
		hours = $("hours");
		colons = document.querySelectorAll && document.querySelectorAll(".colon") || [];

		document.body.removeChild ($("message"));

		document.addEventListener ("click", function (event) {
				displayHex = !displayHex;
			}, false);

		tick ();
		setInterval (tick, 200);
	}

	init ();
})();
