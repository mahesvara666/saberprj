<?php

class FacultyTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('faculty')->delete();
		Faculty::create(array(
			'staff_id' => 1
		));
		Faculty::create(array(
			'staff_id' => 3
		));
	}

}