<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Cached pages
 *
 */
abstract class Controller_Cached extends Controller_Site
{	
	public function after()
	{
		parent::after();
		
		// Only enable page caching on production environment
		if (Kohana::$environment === Kohana::PRODUCTION)
		{
			$uri = Arr::get($_SERVER, 'REQUEST_URI', $this->request->uri());
			
			Pagecache::factory($uri)
				->write($this->response->body());	
		}
	}
}
