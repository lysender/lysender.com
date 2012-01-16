<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Projects extends Controller_Cached
{

	public function action_index()
	{
		$this->template->title = 'Projects';
		$this->template->description = 'Projects developed by Lysender';
		$this->template->keywords = 'projects, lysender, info, web development, php, zend framework, jquery';
		$this->template->styles['media/css/jquery.lightbox-0.5.css'] = 'projection, screen';
		$this->template->scripts[] = $this->asset->asset_url('/media/js/jquery.lightbox-0.5.min.js');
		$this->template->scripts[] = $this->asset->asset_url('/media/js/project.js');

		$project_images = array(
			'techtuit' => array(
				'techtuit-main-menu.png',
				'techtuit-import-excel.png',
				'techtuit-shipment-mp3.png'
			),
			'rajahtours' => array(
				'control-center-profiles.png',
				'control-center-rates.png',
				'control-center-vehicles.png'
			),
			'daito' => array(
				'main-menu.png',
				'search-form-1.png',
				'entry-form-1.png',
				'entry-form-2.png'
			),
			'manken' => array(
				'main-page.png',
				'list-page-1.png',
				'list-page-2.png',
				'mapping.png'
			)
		);

		$this->view = View::factory('projects/index')
			->bind('project_images', $project_images);
	}
	
	public function action_chrometito()
	{
		$this->template->title = 'Project - Chrome Time-in Time-out';
		$this->template->description = 'Time-in Time-out - Google Chrome Extension';
		$this->template->keywords = 'google, chrome, extension, timein, timeout, time-in, time-out';
		$this->template->styles['media/css/jquery.lightbox-0.5.css'] = 'projection, screen';
		$this->template->scripts[] = $this->asset->asset_url('/media/js/jquery.lightbox-0.5.min.js');
		$this->template->scripts[] = $this->asset->asset_url('/media/js/project.js');

		$project_images = array(
			'chrome-tito' => array(
				'chrome-tito-notification.png',
				'chrome-tito-option-page.png'
			)
		);

		$this->view = View::factory('projects/chrometito')
			->bind('project_images', $project_images);
	}
}
