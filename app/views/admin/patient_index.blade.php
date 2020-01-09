@extends('layout.admin') 

@section('body')
<div class="container">
	<h2><b><font color="white">Records</font></b></h2>
<div class="row">

<div class="col-md-6">
 <a href="{{ URL::to('admin') }}" class="btn btn-warning"><span class="fa fa-home"></span></a> &nbsp;
 <a href="{{ URL::to('admin/patient/create') }}" class="btn btn-info" title="Add Patient"><span class="glyphicon glyphicon-pencil"></span></a>
</div>
</div>
<div class="row">
 <div class="col-lg-12">
   <div class="panel panel-info">
    <div class="panel-heading">
    Record's Lists
    </div>
	@if( !empty($items[0]) )
	<div class="panel-body">
       <div class="dataTable_wrapper">
		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
			<thead>
				<th></th>
				<th>Date Added</th>
				<th>Name</th>
				<th>Course Year and Section</th>
				<th>Address</th>
				<th>Weight</th>
				<th>Blood Pressure</th>
				<th>Adviser</th>
				<th>Action</th>						
			</thead>
			<tbody>
		@foreach($items as $item)
			<tr>
				<th>{{ $item['id'] }}</th>
				<th>{{ $item->created_at}}</th>
				<td>{{ $item->first_name." ".$item->middle_name." ".$item->last_name }}</td>
				<td>{{ \Bachelor::find($item['bachelor_id'])['code']. " - ".\Bachelor::find($item['bachelor_id'])['year']." ".\Bachelor::find($item['bachelor_id'])['section']}}</td>
				<td>{{ $item['address'] }}</td>
				<td>{{ $item['weight'] }}</td>
				<td>{{ $item['blood_pressure'] }}</td>
				<td>{{ $item['adviser'] }}</td>
				<td>
				{{ Form::open(array('url' => 'admin/patient'.'/'.$item['id'], 'method' => 'DELETE' )) }}
                <a href="{{ URL::to('admin/patient').'/'.$item['id'] }}" title="More details" class="btn btn-customized btn-info"><span class="fa fa-external-link"></span></a> |
                <a href="{{ URL::to('admin/patient').'/'.$item['id'].'/edit' }}" title="Update patient" class="btn btn-customized btn-success"><span class="fa fa-pencil-square-o"></span></a>
                | <button type="submit" onclick="return confirm('Are you sure you want to delete this patient?')" class="btn btn-customized btn-default" title="Delete patient"><span class="fa fa-trash-o"> </span></button>           
                {{ Form::close() }}
                </td>
			</tr>
				
		@endforeach
			</tbody>
		</table>
		</div>
	</div>
	</div>
	</div>
 </div>
</div>

		{{ $items->links() }}
	@else
		<?php $q = Input::get('q') ?>
		@if(!empty($q))
			<center><h2>No Results for {{ Input::get('q') }}</h2></center>
		@else		
		<center><b><p align="center"><h1>No Records Exist! ! !</h1></p></b></center>
		@endif
	@endif
@stop