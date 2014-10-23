<?php

class LipsumController extends \BaseController {

	public function create()
	{
		$num_paragraphs = 4;
		$paragraph_length = 'short';

		if(!is_null(Input::get('num_paragraphs')) && Input::get('num_paragraphs') > 0) {
			$num_paragraphs = Input::get('num_paragraphs');
		}

		if(!is_null(Input::get('paragraph_length')) &&
			(Input::get('paragraph_length') == 'short' ||
			 Input::get('paragraph_length') == 'medium' ||
			 Input::get('paragraph_length') == 'long')) {
			$paragraph_length = Input::get('paragraph_length');
		}

		return View::make('lipsum', array(
			'num_paragraphs' => $num_paragraphs,
			'paragraph_length' => $paragraph_length
		));
	}
}
