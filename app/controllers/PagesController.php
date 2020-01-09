<?php

class PagesController extends BaseController {

	protected $data = array();

	public function __construct()
	{
		$this->data['title'] = "Saber Project";
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	public function getIndex()
	{
		if(Auth::check())
		{
			return Redirect::to('admin');
		}

		return View::make('index', $this->data);
		
	}

	public function getLogin()
	{
		if(Auth::check())
		{
			return Redirect::to('admin');
		}

		return View::make('index', $this->data);
		
	}

	public function postLogin()
	{
		$val = Validator::make(Input::all(), [
				'username'   => 'required|min:5',
				'password'   => 'required|alphaNum|min:5'
			]);

		if($val->fails())
		{
			return Redirect::to('index')
				->withErrors($val) 
				->withInput(Input::except('password')); 
		} 
		else 
		{

			$userdata = array(
				'username' 	=> Input::get('username'),
				'password' 	=> Input::get('password')
			);

			if (Auth::attempt($userdata)) 
			{
				return Redirect::intended('admin')->with('success_message', 'Welcome '.  Auth::user()->username. ' !');
			} 
			else 
			{	 	
				return Redirect::to('index')->with('error_message', 'Invalid Login Credential, Please Try Again.');

			}

		}
	}

	public function getAbout()
	{
		return Response::make( View::make('about', $this->data));
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::to('index')->with('success_message', 'Logged Out Successfully!');
	}
}
