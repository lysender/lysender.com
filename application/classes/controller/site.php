<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Site extends Controller_Template
{
	/**
	 * @var string
	 */
	public $template = 'site/template';
	
	/**
	 * @var string
	 */
	public $header = 'site/header';
	
	/**
	 * @var Kohana_View
	 */
	public $view;
	
	/**
	 * @var string
	 */
	public $footer = 'site/footer';

	/** 
	 * Asset helper
	 *
	 * @var Kollection_Asset
	 */
	public $asset;
	
	/** 
	 * before()
	 *
	 * Called before action is called
	 */
	public function before()
	{
		parent::before();

		// Initialize asset
		$config = Kohana::$config->load('asset');

		// Load config by environment
		$this->asset = new Kollection_Asset($config[Kohana::$environment]);

		// Set asset helper to view globally
		View::set_global('asset', $this->asset);

		if ($this->auto_render)
		{
			$this->template->styles = array(
				$this->asset->asset_url('/media/css/screen.css')	=> 'screen, projection',
				$this->asset->asset_url('/media/css/print.css')	=> 'print',
				$this->asset->asset_url('/media/css/style.css')	=> 'screen, projection'
			);

			$this->template->scripts = array(
				$this->asset->asset_url('/media/js/jquery-1.4.2.min.js')
			);
		}
	}

	/**
	 * after()
	 * 
	 * @see system/classes/kohana/controller/Kohana_Controller_Template#after()
	 */
	public function after()
	{
		if ($this->auto_render)
		{
			// template disyplay logic
			$this->template->header = View::factory($this->header);
			$this->template->content = $this->view;
			
			$this->template->footer = View::factory($this->footer);			
		}

		return parent::after();
	}
}
