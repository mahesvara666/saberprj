<?php

class RoomTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('room')->delete();
		Room::create(array(
			'code' => 'TB2-3',
			'description' => 'Technology Building 2 area 3'
		));
		Room::create(array(
			'code' => 'SB1-2',
			'description' => 'Science Building 1 area 2',
		));
		Room::create(array(
			'code' => 'Annex 2',
			'description' => 'Annex 2'
		));
	}

}
