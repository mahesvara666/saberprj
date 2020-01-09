@extends('layout.admin')

@section('body')
<div class="container">
<h2><b><font color="white">Diagnosis</font></b></h2>
<div class="row">

<div class="col-md-6">
 <a href="{{ URL::to('admin') }}" class="btn btn-warning"><span class="fa fa-home"></span></a> &nbsp;
 <a href="{{ URL::to('admin/diagnosis/create') }}" class="btn btn-info" title="Add Patient"><span class="glyphicon glyphicon-pencil"></span></a>
</div>
</div>
<div class="row">
 <div class="col-lg-12">
   <div class="panel panel-info">
    <div class="panel-heading">
    Patient Lists
    </div>
	@if( !empty($items[0]) )
	<div class="panel-body">
       <div class="dataTable_wrapper">
		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
		<thead>
			<th></th>
			<th>Date and Time</th>
			<th>Patient</th>
			<th>Complaints</th>
			<th>Findings</th>
			<th>Prescription/s</th>\
			<th>Medicine Received</th>
			<th>Intake</th>
		</thead>
		<tbody>
		@foreach($items as $item)
		<tr>
			<th>{{ $item['id'] }}</th>
			<td>
				{{$item->created_at}}
			</td>
			<td>
				 {{$item->patient()->first()->first_name." ".$item->patient()->first()->middle_name." ".$item->patient()->first()->last_name }}					
			</td>
			<td>
				{{$item->complaints}}
			</td>

			<td>
				{{$item->findings }}		
			</td>

			<td>
				@foreach($item->medicine()->get() as $m)
					<span class="label label-success">{{ $m->brand_name}}</span>
				@endforeach
			</td>
			<td>
				{{$item->medicine_receive}}
			</td>

			<td>
				{{ $item->session }} / day
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
			<center><b><p align="center"><h1>No Record! ! !</h1></p></b></center>
		@endif
	@endif
@stop
