<?php

class Bachelor extends Eloquent
{
	public static $rules = [
		'code' 			=> 'required',
		'description' 	=> 'required',
		'year'			=> 'numeric|max:9|min:1|required'
	];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'bachelor';

	public function patient()
	{
		return $this->belongsTo("Patient");
	}
}
