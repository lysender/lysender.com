<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Extra_Index extends Controller_Cached
{

	public function action_index()
	{
		$this->template->title = 'Extras';
		$this->template->description = 'Extras';
		$this->template->keywords = 'extras, pets';
		
		$this->view = View::factory('extra/index/index');
	}
}