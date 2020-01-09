<?php

class StatusTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('status')->delete();
		Status::create(array(
			'status' => 'organic'
		));
		Status::create(array(
			'status' => 'part-time'
		));
	}

}
