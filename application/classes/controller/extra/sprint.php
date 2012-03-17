<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Extra_Sprint extends Controller_Cached
{

	public function action_index()
	{
		$this->view = View::factory('extra/sprint/index');
		$this->view->letters = range('a', 'z');

		$letter = $this->request->param('letter');
		$title_extra = '';

		if ($letter)
		{
			$title_extra = ' - Sprint '.strtoupper($letter);
			$this->view->letter = $letter;
			$config = Kohana::$config->load('sprint/'.$letter);

			if ( ! empty($config->adjectives) && ! empty($config->animals))
			{
				$this->template->head_scripts = 'var sprintAdj = '.json_encode($config->adjectives)
					.'; var sprintAnimals = '.json_encode($config->animals).';';

				$this->view->has_list = TRUE;
			}
			else
			{
				$this->view->has_list = FALSE;
			}
		}

		$this->template->title = 'Sprint Name Generator'.$title_extra;
		$this->template->description = 'Extras - Sprint Name Generator'.$title_extra;
		$this->template->keywords = 'extras, sprint, name, generator';
		$this->template->scripts[] = $this->asset->asset_url('/media/js/sprint.js');
		$this->template->styles[$this->asset->asset_url('/media/css/tools.css')] = 'screen, projection';
		$this->template->show_google_plusone = true;
		$this->template->show_facebook_like = true;
	}
}