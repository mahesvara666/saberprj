<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('user')->delete();
		User::create(array(
			'username' => 'zblpw',
			'password' => Hash::make('admin')
		));
		User::create(array(
			'username' => 'admin',
			'password' => Hash::make('password')
		));
		User::create(array(
			'username' => 'bioslogin',
			'password' => Hash::make('comsys')
		));
	}

}
