<?php

class MedicineController extends \Admin 
{

	protected $data;

	protected $model;

	public function __construct(\Medicine $medicine)
	{
		parent::__construct();
		$this->model = $medicine;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->data['items'] = $this->model->paginate($this->data['pagination']);
		return Response::make( View::make('admin.medicine_index', $this->data), 200);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	//	$this->data['category'] = \Categories::lists('category', 'id');
		return Response::make( View::make('admin.medicine_create', $this->data), 200);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validation = Validator::make(Input::all(), \Medicine::$rules);
		if($validation->fails())
		{
			return Redirect::to('admin/medicine/create')
					->withErrors($validation)
					->withInput(Input::all());
		}

		$item = new $this->model;
			$item->brand_name = Input::get('brand_name');
			$item->generic_name = Input::get('generic_name');
			$item->dose = Input::get('dose');
			$item->dose_unit = Input::get('dose_unit');
			$item->stock = Input::get('stock');
			$item->stock_unit = Input::get('stock_unit');
		$item->save();

	//	if( !empty($category) )
	//	{
	//		foreach (Input::get('category') as $category) 
	//		{
	//			$cat = Categories::find($category);
	//			$cat->medicine()->save($item);
	//		}
	//	}
		return Redirect::to('admin/medicine')
					->with('success_message', 'New Medicine added Successfully!');
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
		return Response::make( View::make('admin.medicine_show', $this->data), 200);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
	//	$this->data['category'] = \Categories::lists('category', 'id');
		$this->data['item'] = $this->model->find($id);

		return Response::make( View::make('admin.medicine_edit', $this->data), 200);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
		$validation = Validator::make(Input::all(), \medicine::$rules);
		$category = Input::get('category');
		if($validation->fails())
		{
			return Redirect::to('admin/medicine/'.$id.'/edit')
					->withErrors($validation)
					->withInput(Input::all());
		}

		// find
		$item = $this->model->find($id);
			$item->brand_name = Input::get('brand_name');
			$item->generic_name = Input::get('generic_name');
			$item->dose = Input::get('dose');
			$item->dose_unit = Input::get('dose_unit');
			$item->stock = Input::get('stock');
			$item->stock_unit = Input::get('stock_unit');	
		$item->save();


	//	if(!empty( $category ))
	//	{
	//		// delete the Previous Category First
	//		$item->category()->detach();				
	//		
	//		foreach (Input::get('category') as $category) 
	//		{
	//			$cat = Categories::find($category);
	//			$cat->medicine()->save($item);
	//		}
	//	}

		return Redirect::to('admin/medicine')
					->with('success_message', 'Medicine Updated Successfully!');
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

		return Redirect::to('admin/medicine')->with('success_message', 'medicine #'.$id.' Deleted Successfully');
	}
}
