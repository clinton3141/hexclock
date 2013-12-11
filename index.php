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
		<link rel="stylesheet" href="style.css" />
		<link rel="apple-touch-icon" href="touch-icon.png"/>
		<link rel="shortcut icon" href="/favicon.ico" />
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
		<p id="clock"><span id="hours"><?php echo date('H'); ?></span><span class="colon">:</span><span id="minutes"><?php echo date('i'); ?></span><span class="colon">:</span><span id="seconds"><?php echo date('s'); ?></span></p>
		<p>An experiment in visualising time by <a href="http://slightlymore.co.uk/">Clinton</a></p>


		<aside>
			<div class="fb-like" data-href="http://hexclock.slightlymore.co.uk/" data-send="false" data-layout="button_count" data-width="112" data-show-faces="true"></div>
		<a href="https://twitter.com/share" class="twitter-share-button" data-count="none" data-via="iblamefish">Tweet</a><script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>	<iframe allowtransparency="true" frameborder="0" scrolling="no" src="//platform.twitter.com/widgets/follow_button.html?screen_name=iblamefish&show_count=false" style="width:150px; height:20px;"></iframe><iframe allowtransparency="true" frameborder="0" scrolling="no" src="//platform.twitter.com/widgets/follow_button.html?screen_name=hexclock&show_count=false" style="width:150px; height:20px;"></iframe>
			<a href="http://github.com/slightlymore/hexclock"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png" alt="Fork me on GitHub"></a>
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

			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) {return;}
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=155450177843536";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
		</aside>
	</body>
</html>
