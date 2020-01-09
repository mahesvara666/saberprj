<?php

class Diagnosis extends Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	public static $rules = 
	[
		'patient_id' 	=> 'required|exists:patient,id',
		'complaints'	=> 'required',
		'medicine_receive'	=> 'required|numeric|min:1',
		'medicine_id' 	=> 'required|exists:medicine,id',
		'findings'		=> 'required',
		'session'		=> 'required|numeric|max:9|min:1'
	];

	protected $table = 'diagnosis';

	//public $timestamps = false;

	public function patient()
	{
		return $this->belongsTo('Patient');
	}

	public function medicine()
	{
		return $this->belongsToMany('Medicine');
	}
}
