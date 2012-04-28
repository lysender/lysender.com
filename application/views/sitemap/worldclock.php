<?php

foreach ($timezones as $name)
{
	echo 
		'<url>',
			'<loc>', URL::site('/extra/tools/worldclock/'.HTML::chars($name), TRUE), '</loc>',
			'<changefreq>weekly</changefreq>',
			'<priority>0.8</priority>',
		'</url>';
}