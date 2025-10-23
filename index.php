<?php
if (isset($_GET['style'])):
  header("Content-Type: text/css");
  include ("./style.css");
  die();
endif;

$hours = date('H');
$minutes = date('i');
$seconds = date('s');

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
	return intval($number) * intval($maxValue) / intval($divisions);
}

function hextime ()
{
	$h = intval(normalise (date('G'), 255, 24));
	$m = intval(normalise (date('i'), 255, 60));
	$s = intval(normalise (date('s'), 255, 60));

	echo "$h,$m,$s";
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

				I also just wanted to write some JavaScript

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
		<meta name="x-project-codename" content="0xC" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<link type="text/css" rel="stylesheet" href="?style" />
		<link rel="apple-touch-icon" href="touch-icon.png"/>
		<link rel="shortcut icon" href="/favicon.ico" />
	</head>
	<body>
		<h1>Hex Clock</h1>
		<p id="message">You need JavaScript enabled for the full hexclock experience!</p>
		<p id="clock"><span id="hours"><?php echo date('H'); ?></span><span class="colon">:</span><span id="minutes"><?php echo date('i'); ?></span><span class="colon">:</span><span id="seconds"><?php echo date('s'); ?></span></p>
		<p>An experiment in visualising time by <a href="http://slightlymore.co.uk/">Clinton</a></p>


		<aside>
			<a href="http://github.com/clinton3141/hexclock">Source on Github</a>
			<script src="ticktock.js"></script>
		</aside>
	</body>
</html>
