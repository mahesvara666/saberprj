<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user';

    /**
     *  Array of field available for form fill-ups
     *
     * @access protected
     * @var array
     */
    protected $fillable = array('username', 'password');

    /**
     * The set of rules set in validation
     * 
     * @access public
     * @var array
     */
	public static $rules = array(
			'username'   => 'required|min:5',
			'fullname' 	 => 'required',
			'email'		 => 'required',
			'password'   => 'required|alphaNum|min:5'
	);

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');




}
