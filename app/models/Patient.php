<?php

class Patient extends Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'patient';

	public static $rules = [
			'first_name' 	=> 'required|max:25',
			'last_name' 	=> 'required|max:25',
			'bachelor_id' 	=> 'required|exists:bachelor,id',
			'address'		=> 'required|max:50',
			'gender' 		=> 'required|in:male,female,humunculus,Male,Female',
			'age'			=> 'required|numeric|max:100|min:1',
			'adviser' 	    => 'required|max:25',
			'weight'    	=> 'required|numeric',
			'blood_pressure'=> 'required',
			'temperature'	=> 'required|numeric|max:50|min:1'

	];

	public function diagnosis()
	{
		return $this->hasMany('Diagnosis');
	}

	public function course()
	{
		return $this->belongsTo('Bachelor');
	}
}
