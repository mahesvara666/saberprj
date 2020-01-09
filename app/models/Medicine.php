<?php

class Medicine extends Eloquent
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	public static $rules = [
		// I am not responsible for your app's validation
		// but here. Put your validations here  in forms of
		// associative array example.
		'brand_name' 	=> 'required',
		'generic_name' 	=> 'required',
		'dose'			=> 'required|numeric|min:1',
		'dose_unit'		=> 'required',
		'stock'			=> 'required|numeric|min:1',
		'stock_unit'	=> 'required'

	];
	
	protected $table = 'medicine';

	public $timestamps = false;

	public function diagnosis()
	{
		return $this->belongsToMany('Diagnosis');
	}
}
