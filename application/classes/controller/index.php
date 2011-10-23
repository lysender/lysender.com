<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller_Cached
{
	public function action_index()
	{
		$this->template->description = 'Lysender is a full time web developer / programmer. He develops, design, implements, optimize and maintains web applications for the Internet or for corporate LAN using open source tools and technologies.';
		$this->template->keywords = 'lysender, web developer, programmer, php, xhtml, mysql, zend framework, kohana, css';
		
		$this->view = View::factory('index/index');
	}
}
