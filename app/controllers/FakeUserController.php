<?php

class FakeUserController extends \BaseController {

	public function create()
	{
		$faker = Faker\Factory::create();

		return View::make('fakeuser', array(
			'name' => $faker->name,
			'address' => $faker->address
		));
	}
}
