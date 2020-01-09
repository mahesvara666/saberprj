<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Diag extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('diagnosis', function($d)
		{
			$d->increments('id')->unsigned();
			$d->string('findings');
	//		many to many fucker
	//		$d->integer('medicine_id')->unsigned()->nullable();
	//		$d->foreign('medicine_id')->references('id')->on('medicine');
			$d->integer('patient_id')->unsigned()->nullable();
			$d->foreign('patient_id')->references('id')->on('patient')->onDelete('cascade');
			$d->string('complaints');
			$d->integer('medicine_receive');
			$d->integer('session')->unsigned();
			$d->timestamps();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('diagnosis');
	}

}
