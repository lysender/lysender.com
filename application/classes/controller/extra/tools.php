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
		$this->template->keywords = 'url, encode, decode';
		
		$this->template->scripts[] = $this->asset->asset_url('/media/js/urlencode.js');
		$this->template->styles[$this->asset->asset_url('/media/bootstrap/css/bootstrap-responsive.min.css')] = 'screen, projection';
		$this->template->styles[$this->asset->asset_url('/media/css/tools.css')] = 'screen, projection';
		
		$this->template->show_google_plusone = true;
		$this->template->show_facebook_like = true;
	}
	
	public function action_worldclock()
	{
		// Generate timezone list and offsets
		$tzlist = array();
		$regions = array(
			'Africa' => DateTimeZone::AFRICA,
			'America' => DateTimeZone::AMERICA,
			'Antarctica' => DateTimeZone::ANTARCTICA,
			'Arctic' => DateTimeZone::ARCTIC,
			'Asia' => DateTimeZone::ASIA,
			'Atlantic' => DateTimeZone::ATLANTIC,
			'Australia' => DateTimeZone::AUSTRALIA,
			'Europe' => DateTimeZone::EUROPE,
			'Indian' => DateTimeZone::INDIAN,
			'Pacific' => DateTimeZone::PACIFIC,
			//'UTC' => DateTimeZone::UTC,
			//'ALL' => DateTimeZone::ALL,
			'ALL' => DateTimeZone::ALL_WITH_BC,
		);
		$all = array();
		foreach ($regions as $name => $mask)
		{
			$region_tz = DateTimeZone::listIdentifiers($mask);
			$tmp = array();
			
			foreach ($region_tz as $tzmask)
			{
				$d = new DateTime('now', new DateTimeZone($tzmask));
				$tmp[$tzmask] = $d->getOffset();
			}
			
			$tzlist[$name] = $tmp;
		}

		// Detect timezone from the url if there are any
		$urltz = array();
		$selected_timezone = NULL;
		$idents = array('ident1', 'ident2', 'ident3');
		
		foreach ($idents as $key)
		{
			$identifier = $this->request->param($key);

			if ($identifier)
			{
				$urltz[] = $identifier;
			}
		}
		if ( ! empty($urltz))
		{
			$selected_timezone = implode('/', $urltz);

			if ( ! isset($tzlist['ALL'][$selected_timezone]))
			{
				$selected_timezone = NULL;
			}
		}

		$this->view = View::factory('extra/tools/worldclock');

		$page_title = 'Tools :: World Clock';
		$page_desc = 'Extras - Tools - World Clock';
		$formatted_timezone = NULL;

		if ($selected_timezone)
		{
			$formatted_timezone = str_replace('_', ' ', $selected_timezone);
			$page_title = $formatted_timezone.' - World Clock';
			$page_desc = $formatted_timezone.' - World Clock';
		}

		$this->template->title = $page_title;
		$this->template->description = $page_desc;
		$this->template->keywords = 'world, clock, timezone';
		
		$this->template->scripts[] = $this->asset->asset_url('/media/js/json2_min.js');
		$this->template->scripts[] = $this->asset->asset_url('/media/js/cookiegroup.js');
		$this->template->scripts[] = $this->asset->asset_url('/media/js/worldclock.js');
		$this->template->styles[$this->asset->asset_url('/media/bootstrap/css/bootstrap-responsive.min.css')] = 'screen, projection';
		$this->template->styles[$this->asset->asset_url('/media/css/tools.css')] = 'screen, projection';
		
		$this->template->show_google_plusone = true;
		$this->template->show_facebook_like = true;

		$this->template->head_scripts = sprintf('var tzlist = %s; var selected_timezone = %s', json_encode($tzlist), json_encode($selected_timezone));
		$this->view->timezones = $tzlist['ALL'];
		$this->view->selected_timezone = $selected_timezone;
		$this->view->formatted_timezone = $formatted_timezone;
	}

	public function action_base64()
	{
		$this->view = View::factory('extra/tools/base64');

		$this->template->title = 'Tools :: Base64 Encoder/Decoder';
		$this->template->description = 'Extras - Tools - Base64 Encoder/Decoder';
		$this->template->keywords = 'base64, encode, decode';
		
		$this->template->scripts[] = $this->asset->asset_url('/media/js/utf8_encode.js');
		$this->template->scripts[] = $this->asset->asset_url('/media/js/utf8_decode.js');
		$this->template->scripts[] = $this->asset->asset_url('/media/js/base64_encode.js');
		$this->template->scripts[] = $this->asset->asset_url('/media/js/base64_decode.js');
		$this->template->scripts[] = $this->asset->asset_url('/media/js/base64.js');
		$this->template->styles[$this->asset->asset_url('/media/bootstrap/css/bootstrap-responsive.min.css')] = 'screen, projection';
		$this->template->styles[$this->asset->asset_url('/media/css/tools.css')] = 'screen, projection';
		
		$this->template->show_google_plusone = true;
		$this->template->show_facebook_like = true;
	}
}