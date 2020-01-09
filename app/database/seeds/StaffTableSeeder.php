<?php

class StaffTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('staff')->delete();

		Staff::create(array(
			'status_id' => 1,
			'designation_id' => 1,
			'bachelor_id'  => 1,
			'first_name' => 'Jacob',
			'middle_name' => '',
			'last_name' => 'Baring',
			'gender' => 'male',
			'email' => 'electro7bug@gmail.com'
		));

		Staff::create(array(
			'status_id' => 1,
			'designation_id' => 2,
			'bachelor_id'  => 2,
			'first_name' => 'Yakov',
			'middle_name' => 'Mitnick',
			'last_name' => 'Wozniak',
			'gender' => 'male',
			'email' => 'admin@jacobbaring.com'
		));

		Staff::create(array(
			'status_id' => 2,
			'designation_id' => 2,
			'bachelor_id'  => 1,
			'first_name' => 'John',
			'middle_name' => '',
			'last_name' => 'Doe',
			'gender' => 'male',
			'email' => 'umadbro@leetcaptain.org'
		));
	}

}
