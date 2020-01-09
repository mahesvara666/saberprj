<?php

//use \Aeon\Repository\BachelorRepositoryInterface as Repository;
//use \Aeon\Transformer\BachelorTransformer as Transformer;
//use \Aeon\Aeon;

class BachelorController extends Admin
{
	protected $storage;

	protected $data;

	public function __construct(Bachelor $bachelor)
	{
		parent::__construct();
		$this->storage = $bachelor;
	}

	public function index()
	{
		$this->data['data'] = $this->storage->paginate($this->data['pagination']);
		return Response::make( View::make('admin.bachelor_index', $this->data), 200);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return Response::make( View::make('admin.bachelor_create', $this->data), 200 );
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$status = Validator::make(Input::all(), \Bachelor::$rules);
		
		// tells if our repository returns a validation object
		// if true it means validation failed or error occured
		if($status->fails())
		{
			return Redirect::to('admin/bachelor/create')
					->withErrors($status)
					->withInput(Input::all());
		}

		$storage = new $this->storage;
			$storage->code = Input::get('code');
			$storage->description = Input::get('description');
			$storage->year = Input::get('year');
			$storage->section = Input::get('section');
		$storage->save();

		return Redirect::to('admin/bachelor')
					->with('success_message', 'New Curriculum added Successfully!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$this->data['item'] = $this->storage->find($id);
		return Response::make( View::make('admin.bachelor_view', $this->data), 200);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->data['item'] = $this->storage->find($id);
		return Response::make( View::make('admin.bachelor_edit', $this->data), 200);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	
		$status = Validator::make(Input::all(), \Bachelor::$rules);
		
		// tells if our repository returns a validation object
		// if true it means validation failed or error occured
		if($status->fails())
		{
			return Redirect::to('admin/bachelor/create')
					->withErrors($status)
					->withInput(Input::all());
		}

		$storage = $this->storage->find($id);
			$storage->code = Input::get('code');
			$storage->description = Input::get('description');
			$storage->year = Input::get('year');
			$storage->section = Input::get('section');
		$storage->save();

		return Redirect::to('admin/bachelor')
					->with('success_message', 'Curriculum Updated Successfully!');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->storage->destroy($id);

		return Redirect::to('admin/bachelor')
					->with('success_message', 'Curriculum Deleted Successfully!');
	}
}
