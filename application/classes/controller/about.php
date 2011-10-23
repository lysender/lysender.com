<?php defined('SYSPATH') or die('No direct script access.');

class Controller_About extends Controller_Cached
{
	protected $_birth_date = '1985-08-08';

	public function action_index()
	{
		$this->template->title = 'About';
		$this->template->description = 'About Lysender';
		$this->template->keywords = 'about, lysender, profile, info, web development, php, zend framework, jquery';
		
		$age = $this->_get_age($this->_birth_date);
		
		$this->view = View::factory('about/index')
			->bind('age', $age);
	}
	
	protected function _get_age($birth_date)
	{
		list($year, $month, $day) = explode('-', $birth_date);
		$ts = time();
		
		$year_diff = date('Y') - $year;
		$month_diff = date('m') - $month;
		$day_diff = date('d') - $day;
		
		if ($day_diff < 0 || $month_diff < 0)
		{
			$year_diff--;
		}
		return $year_diff;
	}
}
