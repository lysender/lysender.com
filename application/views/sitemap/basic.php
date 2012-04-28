<?php

foreach ($config as $freq => $group)
{
	foreach ($group as $item)
	{
		echo 
			'<url>',
				'<loc>', URL::site($item[0], TRUE), '</loc>',
				'<changefreq>', $freq, '</changefreq>',
				'<priority>', $item[1], '</priority>',
			'</url>';
	}
}