<?php defined('SYSPATH') or die('No direct script access.');

return array(
	Kohana::DEVELOPMENT => array(
		'protocol' => 'http',
		'domain' => 'lysender.darkstar.net',
		'path_prefix' => ''
	),
	Kohana::TESTING => array(
		'protocol' => 'http',
		'domain' => 's.lysender.darkstar.net',
		'path_prefix' => '/ly'
	),
	Kohana::STAGING => array(
		'protocol' => 'http',
		'domain' => 's.lysender.darkstar.net',
		'path_prefix' => '/ly'
	),
	Kohana::PRODUCTION => array(
		'protocol' => 'http',
		'domain' => 's.lysender.com',
		'path_prefix' => '/ly'
	)
);