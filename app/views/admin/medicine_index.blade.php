@extends('layout.admin')

@section('body')
<div class="container">	<h2><b><font color="white">Medicine</font></b></h2><
<div class="col-md-6">
 <a href="{{ URL::to('admin') }}" class="btn btn-warning"><span class="fa fa-home"></span></a> &nbsp;
 <a href="{{ URL::to('admin/medicine/create') }}" class="btn btn-info" title="Add Medicine"><span class="glyphicon glyphicon-pencil"></span></a>
</div>
<div class="container">

<div class="row">
 <div class="col-lg-12">
   <div class="panel panel-info">
    <div class="panel-heading">
    Medicine Lists
    </div>
	@if( !empty($items[0]) )
	<div class="panel-body">
       <div class="dataTable_wrapper">
		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
				<th></th>
				<th>Date Added</th>
				<th>Category</th>
				<th>Brand Name</th>
				<th>Dose</th>
				<th>Onhand</th>
				<th>Action</th>
			</thead>
			<tbody>
		@foreach($items as $item)
			<tr>
				<th>{{ $item['id'] }}</th>
				<th>{{ $item->created_at}}</th>
				<td>{{ $item['generic_name'] }}</td>
				<td>{{ $item['brand_name'] }}</td>
				<td>{{ $item['dose']." ".$item['dose_unit'] }}</td>
				<td>{{ $item['stock']}}</td>

				<td>
				{{ Form::open(array('url' => 'admin/medicine'.'/'.$item['id'], 'method' => 'DELETE' )) }}
                <a href="{{ URL::to('admin/medicine').'/'.$item['id'].'/edit' }}" title="Update Medicine" class="btn btn-customized btn-success"><span class="fa fa-pencil-square-o"></span></a>       
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
</div>


		{{ $items->links() }}
	@else
	<center><b><p align="center"><h1>No Medicine Exist ! ! !</h1></p></b></center>
	@endif
@stop