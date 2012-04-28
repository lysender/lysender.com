<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Sitemap extends Controller
{
	public function action_index()
	{
		$this->view = View::factory('sitemap/index');
		$basic_links = View::factory('sitemap/basic');
		$worldclock = View::factory('sitemap/worldclock');

		$this->response->headers('Content-Type', 'application/xml');

		// Load sitemap config
		$basic_links->config = Kohana::$config->load('sitemap');

		// Load timezones for world clock sitemap
		$worldclock->timezones = DateTimeZone::listIdentifiers(DateTimeZone::ALL_WITH_BC);

		$this->view->basic = $basic_links;
		$this->view->worldclock = $worldclock;

		$this->response->body($this->view);
	}

	public function after()
	{
		parent::after();
		
		// Only enable page caching on production environment
		if (Kohana::$environment === Kohana::PRODUCTION)
		{
			$uri = Arr::get($_SERVER, 'REQUEST_URI', $this->request->uri());
			
			$options = Kohana::$config->load('pagecache')->as_array();
			$options['append_status'] = FALSE;

			Pagecache::factory($uri, $options)
				->write($this->response->body());	
		}
	}
}
