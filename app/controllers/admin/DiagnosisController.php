<?php

 class DiagnosisController extends \Admin
 {

 	protected $data;

 	protected $model;

 	private $id;

 	public function __construct(Diagnosis $d)
 	{
 		parent::__construct();
 		$this->model = $d;
 	}

 	public function index()
 	{
 		$searchKey = Input::get('q');
 		$category = Input::get('from');
 		//default items so search wont return empty results if query runs wrong
 		$this->data['items'] = Diagnosis::paginate($this->data['pagination']);
		
 		$validation = Validator::make(Input::all(), [
 				'from' => 'in:medicine,findings,patient'
 			]);
 		
 		if ($validation->fails()) return Redirect::to('admin/diagnosis')->withErrors($validation);

 		// Search Engine function
 		// Evaluates if Search Keyword is Defined
 		if((!empty($searchKey) && !empty($category)) && $category != 'findings' || (isset($searchKey) && isset($category) && $category != 'findings'))
 		{
 			if(Input::get('from') == 'medicine')
 			{
 				$splitQuery = preg_split('/\s+/', $searchKey);
	 			$this->data['items'] = $this->model->whereHas($category, function($q)use($splitQuery){
	 				foreach ($splitQuery as $value) {
	 					$q->where('generic_name', 'LIKE', '%'.$value.'%')
	 				      ->orWhere('brand_name', 'LIKE', '%'.$value.'%');
	 					# code...
	 				}
	 				
	 			})->paginate($this->data['pagination']);	
 			}
 			else
 			{
	 			$splitQuery = preg_split('/\s+/', $searchKey);
	 			$this->data['items'] = $this->model->whereHas($category, function($q)use($splitQuery){
	 				foreach ($splitQuery as $value) {
 					$q->orWhere('last_name', 'LIKE', '%'.$value.'%')
 					  ->orWhere('middle_name', 'LIKE', '%'.$value.'%')
 					  ->orWhere('first_name', 'LIKE', '%'.$value.'%');
 					}
 				})->paginate($this->data['pagination']); 
 			}
 		}
 		elseif($category == 'findings')
 		{
 			$this->data['items'] = $this->model->where('findings','LIKE','%'.$searchKey.'%')->paginate($this->data['pagination']);
 		}
 		
 		return Response::make( View::make('admin.diagnosis_index', $this->data), 200);
 	}
// 	public function show($id)
 //	{
// 		$this->id = $id;
 //		$this->data['items'] = Diagnosis::whereHas('category', function($q)
//		{
 //	  		$q->where('category', 'LIKE', '%'.$this->id.'%');
//
//		})->paginate($this->data['pagination']);
//
//		return Response::make( View::make('admin.diagnosis_show', $this->data), 200);
 //	}

 	// Creation for Diagnosis [added 2015/03/04]
 	public function create()
 	{
 		$this->data['patient_id'] = Patient::select(DB::raw('concat(first_name," ",last_name) as fullname, id'))->lists('fullname','id');
 		$this->data['medicine_id'] = Medicine::lists("brand_name", "id");

 		return Response::make( View::make('admin.diagnosis_create', $this->data), 200);
 	}

 	public function store()
 	{
 		$validation = Validator::make(Input::all(), \Diagnosis::$rules);

 		if($validation->fails())
 		{
 			return Redirect::to('admin/diagnosis/create')
 								->withErrors($validation)
 								->withInputs(Input::all());
 		}

 		$item = new \Diagnosis;
 		$item->patient_id = Input::get("patient_id");
 		$item->findings = Input::get('findings');
 		$item->complaints = Input::get('complaints');
 		$item->medicine_receive = Input::get('medicine_receive');
 		$item->session = Input::get('session');
 		$item->save();
 		$item->medicine()->attach(Input::get('medicine_id'));
 		$med_id = \Input::get('medicine_id');
 		foreach ($med_id as $med) {
 			
 			$medicine = \Medicine::find($med);
 			if (((int)$medicine->stock - \Input::get('medicine_receive')) == 0);
 			
 			else {
	 			$medicine->stock = $medicine->stock - (\Input::get('medicine_receive'));
 				$medicine->save();
 			}
 		}

 		return Redirect::to('admin/diagnosis')
 								->with('success_message','New Diagnosis added Successfully');
 	}

 	public function destroy($id)
 	{
		$this->model->destroy($id);

		return Redirect::to('admin/cat')->with('success_message', 'Category Deleted');
 	}
 }