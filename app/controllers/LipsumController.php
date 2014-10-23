<?php

class LipsumController extends \BaseController {

	public function create()
	{
		$num_paragraphs = 4;
		$paragraph_length = 'short';

		if(!is_null(Input::get('num_paragraphs')) && is_numeric(Input::get('num_paragraphs'))) {
			if(Input::get('num_paragraphs') < 1) {
				$num_paragraphs = 1;
			}
			else if(Input::get('num_paragraphs') > 100) {
				$num_paragraphs = 100;
			}
			else {
				$num_paragraphs = Input::get('num_paragraphs');
			}
		}

		if(!is_null(Input::get('paragraph_length')) &&
			(Input::get('paragraph_length') == 'short' ||
			 Input::get('paragraph_length') == 'medium' ||
			 Input::get('paragraph_length') == 'long')) {
			$paragraph_length = Input::get('paragraph_length');
		}

		$generator = new Badcow\LoremIpsum\Generator();

		$paragraphs = array();

		for($i = 0; $i < $num_paragraphs; $i++) {
			$num_sentences = 1;

			if($paragraph_length == 'short') {
				$num_sentences = mt_rand(1, 3);
			}
			else if($paragraph_length == 'medium') {
				$num_sentences = mt_rand(3, 6);
			}
			else if($paragraph_length == 'long') {
				$num_sentences = mt_rand(6, 10);
			}

			$sentences = $generator->getSentences($num_sentences);
			$paragraphs[] = implode(' ', $sentences);
		}

		return View::make('lipsum', array(
			'num_paragraphs' => $num_paragraphs,
			'paragraph_length' => $paragraph_length,
			'paragraphs' => $paragraphs
		));
	}
}
