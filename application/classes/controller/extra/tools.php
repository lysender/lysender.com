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
		$this->view = View::factory('extra/tools/worldclock');

		$this->template->title = 'Tools :: World Clock';
		$this->template->description = 'Extras - Tools - World Clock';
		$this->template->keywords = 'world, clock, timezone';
		
		$this->template->scripts[] = $this->asset->asset_url('/media/js/json2_min.js');
		$this->template->scripts[] = $this->asset->asset_url('/media/js/cookiegroup.js');
		$this->template->scripts[] = $this->asset->asset_url('/media/js/worldclock.js');
		$this->template->styles[$this->asset->asset_url('/media/bootstrap/css/bootstrap-responsive.min.css')] = 'screen, projection';
		$this->template->styles[$this->asset->asset_url('/media/css/tools.css')] = 'screen, projection';
		
		$this->template->show_google_plusone = true;
		$this->template->show_facebook_like = true;
		
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

		$this->template->head_scripts = sprintf('var tzlist = %s;', json_encode($tzlist));
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