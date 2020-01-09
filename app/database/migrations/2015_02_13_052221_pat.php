	<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pat extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('patient',function($patient) {
			$patient->increments('id')->unsigned();
			$patient->string('first_name', 20);
			$patient->string('middle_name',20);
			$patient->string('last_name',20);
			$patient->integer('age');
			$patient->integer('bachelor_id')->nullable()->unsigned();
			$patient->foreign('bachelor_id')->references('id')->on('bachelor')->onDelete('cascade');
			$patient->string('address',50);
			$patient->integer('temperature');			
			$patient->string('gender',7);
			$patient->integer('weight');
			$patient->string('blood_pressure',7);
			$patient->string('blood_type',5);
			$patient->string('adviser');
			$patient->timestamps();
		});	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('patient');
	}

}
