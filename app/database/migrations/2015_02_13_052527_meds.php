<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Meds extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('medicine',function($medicine) {
			$medicine->increments('id')->unsigned();
			$medicine->string('brand_name');
			$medicine->string('generic_name');
			$medicine->integer('dose');
			$medicine->integer('stock');
			$medicine->string('dose_unit');
			$medicine->string('stock_unit');
			$medicine->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('medicine');
	}

}
