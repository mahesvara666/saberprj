<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AeonBachelor extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bachelor',function($bachelor) {
			$bachelor->increments('id')->unsigned();
			$bachelor->string('code',8);
			$bachelor->string('description');
			$bachelor->integer('year')->unsigned()->nullable();
			$bachelor->string('section', 15);
	//		$bachelor->boolean('isOffered');
			$bachelor->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bachelor');
	}

}
