<?php

class DesignationTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('designation')->delete();
		Designation::create(array(
			'designation' => 'Custom'
		));
		Designation::create(array(
			'designation' => 'No Administrative Designation'
		));
		Designation::create(array(
			'designation' => 'Chair'
		));
		Designation::create(array(
			'designation' => 'NSTP Coordinator'
		));
		Designation::create(array(
			'designation' => 'Production Project'
		));
		Designation::create(array(
			'designation' => 'Director'
		));
		Designation::create(array(
			'designation' => 'Assistant Campus Director'
		));
		Designation::create(array(
			'designation' => 'Campus Director'
		));

		Designation::create(array(
			'designation' => 'Vice President'
		));
		Designation::create(array(
			'designation' => 'President'
		));
	}

}
