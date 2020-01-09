<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DiagnosisMedicine extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('diagnosis_medicine', function($d)
		{
			$d->increments('id')->unsigned();
			$d->integer('medicine_id')->unsigned()->nullable();
			$d->foreign('medicine_id')->references('id')->on('medicine')->onDelete('cascade');
			$d->integer('diagnosis_id')->unsigned()->nullable();
			$d->foreign('diagnosis_id')->references('id')->on('diagnosis')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('diagnosis_medicine');
	}

}
