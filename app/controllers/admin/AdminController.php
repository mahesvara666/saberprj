<?php

 class AdminController extends Admin
 {
 	protected $model;

 	protected $data;

 	public function __construct(\Diagnosis $d)
 	{
 		$this->model =  $d;
 		parent::__construct();
 	}

 	public function getIndex()
 	{
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
	 			$this->data['items'] = $this->model->whereHas($category, function($q){
	 				$q->where('generic_name', 'LIKE', '%'.Input::get('q').'%')
	 				  ->orWhere('brand_name', 'LIKE', '%'.Input::get('q').'%');
	 			})->paginate($this->data['pagination']);	
 			}
 			else
 			{
	 			$this->data['items'] = $this->model->whereHas($category, function($q){
 					$q->where('last_name', 'LIKE', '%'.Input::get('q').'%')
 					  ->orWhere('middle_name', 'LIKE', '%'.Input::get('q').'%')
 					  ->orWhere('first_name', 'LIKE', '%'.Input::get('q').'%');
 				})->paginate($this->data['pagination']);
 			}
 		}
 		elseif($category == 'findings')
 		{
 			$this->data['items'] = $this->model->where('findings','LIKE','%'.$searchKey.'%')->paginate($this->data['pagination']);
 		}
 		

 		return Response::make( View::make('admin.index', $this->data), 200);
 	}
 
 }