<?php
$hours = time('H');
$minutes = time ('i');
$seconds = time ('s');

function stringify ($number)
{
	$number = floor ((int)$number);
	if ($number < 10)
	{
		$number = "0" . $number;
	}
	return $number;
}

function normalise ($number, $maxValue, $divisions)
{
	return $number * $maxValue / $divisions;
}

function hextime ()
{
	$h = normalise (time('H'), 255, 24);
	$m = normalise (time('i'), 255, 60);
	$s = normalise (time('s'), 255, 60);

	echo "0,0,0";
}
?><!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<!--
			Hello inquisitive view-source people!

			Things you might want to know:

			WHO BUILT THIS?
				- umm, well, it says in the footer, but if you insist, it was
				made by me, Clinton Montague.

			WHY?
				- why not?

			YOU'RE NOT USING jQuery!
				- that's because you don't need jQuery for everything. Sometimes
				it's best to use vapor.js - https://github.com/madrobby/vapor.js

			WHAT MADE YOU DO IT?
				- I was being artistic and wanted to think of a new way to
				visualist time.

			WHAT DOES IT DO?
				- it changes the background colour of the page based on the
				time of day. This means that each second has a different colour.

			CAN WE BE FRIENDS?
				- sure!

			WHAT'S YOUR FAVOURITE ROLLER COASTER?
				- that's like a parent trying to choose their favourite child.

		-->

		<title>Hexclock - an experiment in visualising time</title>
		<meta name="author" content="Clinton Montague (@iblamefish)" />
		<meta name="generator" content="vim" />
		<style>
			body
			{
				text-align: center;
				font-family: sans-serif;
				background-color: rgb(<?php hextime(); ?>);
				color: #fff;
				text-shadow: rgba(0,0,0,0.3) 1px 1px 2px,
							rgba(0,0,0,0.3) -1px -1px 2px,
							rgba(0,0,0,0.3) -1px 1px 2px,
							rgba(0,0,0,0.3) 1px -1px 2px;
			}
			h1
			{
				font-size: 160px;
				font-weight: normal;
				letter-spacing: -2px;
			}
			#clock
			{
				margin-top: 100px;
				font-size: 72px;
			}
			a
			{
				color: #fff;
			}
		</style>
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-2513896-18']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
	</head>
	<body>
		<h1>Hex Clock</h1>
		<p id="message">You need JavaScript enabled for the full hexclock experience!</p>
		<p id="clock"><span id="hours"><?php echo date('H'); ?></span>:<span id="minutes"><?php echo date('i'); ?></span>:<span id="seconds"><?php echo date('s'); ?></span></p>
		<p>An experiment in visualising time by <a href="http://slightlymore.co.uk/">Clinton Montague</a></p>


<iframe allowtransparency="true" frameborder="0" scrolling="no" src="//platform.twitter.com/widgets/follow_button.html?screen_name=iblamefish&show_count=false" style="width:150px; height:20px;"></iframe>
		<div class="g-plusone" data-size="medium"></div>
		<script>
			var	background = document.body.style,
				clock,
				seconds,
				minutes,
				hours;

			function $ (id) {
				return document.getElementById(id);
			}

			function init () {
				clock = $("clock");
				seconds = $("seconds");
				minutes = $("minutes");
				hours = $("hours");

				document.body.removeChild ($("message"));

				tick ();
				setInterval (tick, 500);
			}

			function normalise (scalar, maxValue, divisions) {
				return parseFloat(scalar, 10) * maxValue / divisions;
			}

			function getBackgroundColor (h, m, s) {
				h = normalise (h, 255, 24);
				m = normalise (m, 255, 60);
				s = normalise (s, 255, 60);
				var time = [h, m, s].map (stringify);
				return "rgb(" + time.join(",") + ")";
			}

			function stringify (number) {
				number = ~~number;
				if (number < 10) {
					number = "0" + number;
				}
				return number;
			}

			function tick () {
				var time = new Date(),
					s = time.getSeconds (),
					m = time.getMinutes (),
					h = time.getHours ();
				hours.innerHTML = stringify(h);
				minutes.innerHTML = stringify(m);
				seconds.innerHTML = stringify(s);

				document.body.style.backgroundColor = getBackgroundColor (h, m, s);
			}


			init ();
		</script>
		<script src="//platform.twitter.com/widgets.js" type="text/javascript"></script>
		<script type="text/javascript">
		  window.___gcfg = {lang: 'en-GB'};

		  (function() {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/plusone.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		  })();
		</script>
	</body>
</html>
