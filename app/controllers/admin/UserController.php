<?php

/**
 *	User Account Manager 
 *	@version 1.0.0-alpha
 *	@author Jacob Baring <knightventriloquist@gmail.com>
 *
 *-------------------------------------------------------
 *	It is still in alpha though, I still don't fucking know
 *	how to deal with validation updates without recoding the whole
 *	Validations. Highly needs attention and Refactoring...
 */

class UserController extends \Admin {

	protected $data;

	protected $model;

	public function __construct(\User $users)
	{
		parent::__construct();
		$this->model = $users;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->data['items'] = $this->model->paginate($this->data['pagination']);
		return Response::make( View::make('admin.user_index', $this->data), 200);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return Response::make( View::make('admin.user_create', $this->data), 200);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validation = Validator::make(Input::all(), \User::$rules);
		
		if($validation->fails())
		{
			return Redirect::to('admin/users/create')
					->withErrors($validation)
					->withInput(Input::all());
		}

		$item = new $this->model;
		$item->username = Input::get('username');
		$item->password = Hash::make(Input::get('password'));
		$item->fullname = Input::get('fullname');
		$item->email = Input::get("email");
		$item->save();

		return Redirect::to('admin/users')
					->with('success_message', 'New User added Successfully!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$this->data['item'] = $this->model->find($id);
		return Response::make( View::make('admin.user_show', $this->data), 200);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->data['item'] = $this->model->find($id);
		return Response::make( View::make('admin.user_edit', $this->data), 200);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$item = $this->model->find($id);
		$password = Input::get('password');
		if($item->username == Input::get('username') && empty($password) )
		{
			$validation = Validator::make(Input::all(), [
				'username'   => 'required|min:5',
				'fullname' 	 => 'required',
				'email'		 => 'required'
			]);
		}
		elseif($item->username == Input::get('username'))
		{
			$validation = Validator::make(Input::all(), [
				'username'   => 'required|min:5',
				'fullname' 	 => 'required',
				'email'		 => 'required',
				'password'   => 'required|alphaNum|min:5'
			]);
		}
		elseif(empty($password))
		{
			$validation = Validator::make(Input::all(), [
				'username'   => 'required|min:5',
				'fullname' 	 => 'required',
				'email'		 => 'required',
			]);
		}
		else
		{

			$validation = Validator::make(Input::all(), \User::$rules);
			
		}

		if($validation->fails())
		{
			return Redirect::to('admin/users/'.$id.'/edit')
					->withErrors($validation)
					->withInput(Input::all());
		}
		
		$item->username = Input::get('username');
		if(!empty($password))
		{
			$item->password = Hash::make(Input::get('password'));
		}
		$item->fullname = Input::get('fullname');
		$item->email = Input::get("email");
		$item->save();
		
		return Redirect::to('admin/users')
					->with('success_message', 'User Updated Successfully!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->model->destroy($id);

		return Redirect::to('admin/users')->with('success_message', 'User #'.$id.' Deleted Successfully');
	}
}
