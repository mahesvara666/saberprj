<?php

class PatientController extends \Admin {

	protected $data;

	protected $model;

	public function __construct(\Patient $p)
	{
		parent::__construct();
		$this->model = $p;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$searchKey = Input::get('q');
		$category = Input::get('from');
		$this->data['items'] = $this->model->paginate($this->data['pagination']);

		 	
	 			$splitQuery = preg_split('/\s+/', $searchKey);
	 			$this->data['items'] = $this->model->where(function($q)use($splitQuery){
	 				foreach ($splitQuery as $value) {
 					$q->orWhere('last_name', 'LIKE', '%'.$value.'%')
 					  ->orWhere('middle_name', 'LIKE', '%'.$value.'%')
 					  ->orWhere('first_name', 'LIKE', '%'.$value.'%');
 					}
 				})->paginate($this->data['pagination']); 
 			
		return Response::make( View::make('admin.patient_index', $this->data), 200);


	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->data['bachelor'] = [null => 'Courses'] + \Bachelor::select(DB::raw('concat(concat(description, "-",year), " ",section) as curriculum, id'))
																	->groupBy('curriculum')
																	->lists('curriculum','id');

		return Response::make( View::make('admin.patient_create', $this->data), 200);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validation = Validator::make(Input::all(), \Patient::$rules);
		
		if($validation->fails())
		{
			return Redirect::to('admin/patient/create')
					->withErrors($validation)
					->withInput(Input::all());
		}

		$item = new $this->model;
		$item->first_name = Input::get('first_name');
		$item->middle_name = Input::get('middle_name');
		$item->last_name = Input::get('last_name');
		$item->age = Input::get('age');
		$item->gender = Input::get('gender');
		$item->weight = Input::get('weight');
		$item->temperature = Input::get('temperature');
		$item->address = Input::get('address');
		$item->blood_pressure = Input::get('blood_pressure');
		$item->blood_type = Input::get('blood_type');
		$item->adviser = Input::get('adviser');
		$item->bachelor_id = Input::get('bachelor_id');
		$item->save();


		return Redirect::to('admin/patient')
					->with('success_message', 'New Patient Added Successfully!');
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
		return Response::make( View::make('admin.patient_show', $this->data), 200);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->data['bachelor'] = [null => 'Courses'] + \Bachelor::select(DB::raw('concat(concat(Description, "-",year), " ",section) as curriculum, id'))
																	->groupBy('curriculum')
																	->lists('curriculum','id');
		$this->data['item'] = $this->model->find($id);
		return Response::make( View::make('admin.patient_edit', $this->data), 200);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
		$validation = Validator::make(Input::all(), \Patient::$rules);
		
		if($validation->fails())
		{
			return Redirect::to('admin/patient/'.$id.'/edit')
					->withErrors($validation)
					->withInput(Input::all());
		}
		
		$item = $this->model->find($id);
		$item->first_name = Input::get('first_name');
		$item->middle_name = Input::get('middle_name');
		$item->last_name = Input::get('last_name');
		$item->age = Input::get('age');
		$item->gender = Input::get('gender');
		$item->weight = Input::get('weight');
		$item->temperature = Input::get('temperature');
		$item->address = Input::get('address');
		$item->blood_pressure = Input::get('blood_pressure');
		$item->blood_type = Input::get('blood_type');
		$item->adviser = Input::get('adviser');
		$item->bachelor_id = Input::get('bachelor_id');
		$item->save();


		
		return Redirect::to('admin/patient')
					->with('success_message', 'Patient Updated Successfully!');
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

		return Redirect::to('admin/patient')->with('success_message', 'Patient #'.$id.' Deleted Successfully');
	}

}
