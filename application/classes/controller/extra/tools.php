<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Extra_Tools extends Controller_Cached
{

	public function action_index()
	{
		$this->view = View::factory('extra/tools/index');

		$this->template->title = 'Tools';
		$this->template->description = 'Extras - Tools';
		$this->template->keywords = 'extras, tools';
	}
	
	public function action_urlencode()
	{
		$this->view = View::factory('extra/tools/urlencode');

		$this->template->title = 'Tools :: URL Encoder/Decoder';
		$this->template->description = 'Extras - Tools - URL Encoder/Decoder';
		$this->template->keywords = 'extras, tools, url, encode, decode';
		$this->template->scripts[] = $this->asset->asset_url('/media/js/urlencode.js');
		$this->template->styles[$this->asset->asset_url('/media/css/tools.css')] = 'screen, projection';
		$this->template->show_google_plusone = true;
		$this->template->show_facebook_like = true;
	}
}