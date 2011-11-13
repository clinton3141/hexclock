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
		<meta charset="utf-8" />
		<!--
			Hello inquisitive view-source people!

			Things you might want to know:

			WHY IS IT CALLED HEX CLOCK?
				- it converts the hours, minutes and seconds of the day into
				three sets of two digit hexadecimal numbers. These are used
				to set the red, green and blue colours of the background.

				Neat, huh?

			WHO BUILT THIS?
				- umm, well, it says in the footer, but if you insist, it was
				made by me, Clinton - @iblamefish.

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
		<meta name="author" content="Clinton - @iblamefish" />
		<meta name="generator" content="vim" />
		<meta name="description" content="A whole new way to visualise time by using the hours, minutes and seconds to generate a hex colours for the background, a different colour for each second of the day." />
		<link rel="stylesheet" href="style.css" />
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
		<p>An experiment in visualising time by <a href="http://slightlymore.co.uk/">Clinton</a></p>


		<aside>
			<iframe allowtransparency="true" frameborder="0" scrolling="no" src="//platform.twitter.com/widgets/follow_button.html?screen_name=iblamefish&show_count=false" style="width:150px; height:20px;"></iframe>
			<a href="http://github.com/slightlymore/hexclock"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://a248.e.akamai.net/assets.github.com/img/4c7dc970b89fd04b81c8e221ba88ff99a06c6b61/687474703a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f77686974655f6666666666662e706e67" alt="Fork me on GitHub"></a>
			<div class="g-plusone" data-size="medium"></div>
			<script src="ticktock.js"></script>
			<script src="//platform.twitter.com/widgets.js" type="text/javascript"></script>
			<script type="text/javascript">
			  window.___gcfg = {lang: 'en-GB'};

			  (function() {
				var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
				po.src = 'https://apis.google.com/js/plusone.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			  })();
			</script>
		</aside>
	</body>
</html>
