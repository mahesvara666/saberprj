@extends('layout.admin')

@section('body')
<div class="container">
	<h2><b><font color="white">User Management</font></b></h2>
<div class="row">
<div class="col-md-6">		
		<a href="{{ URL::to('admin') }}" class="btn btn-warning"><span class="fa fa-home"></span></a> &nbsp;
		<a href="{{ URL::to('admin/users/create') }}" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></a>
</div>
</div>
<div class="row">
 <div class="col-lg-12">
   <div class="panel panel-info">
    <div class="panel-heading">
    Users Management
    </div>
	@if( !empty($items[0]) )
	<div class="panel-body">
       <div class="dataTable_wrapper">
		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
			<thead>
				<th></th>
				<th>Full Name</th>
				<th>Username</th>
				<th>Email</th>	
				<th>Action</th>
			</thead>
			<tbody>
		@foreach($items as $item)
			<tr>
				<th>{{ $item['id'] }}</th>
				<td>{{ $item['fullname'] }}</td>
				<td>{{ $item['username'] }}</td>
				<td>{{ $item['email'] }}</td>
				<td>
				{{ Form::open(array('url' => 'admin/users'.'/'.$item['id'], 'method' => 'DELETE' )) }}
                <a href="{{ URL::to('admin/users').'/'.$item['id'].'/edit' }}" title="Update User" class="btn btn-customized btn-success"><span class="fa fa-pencil-square-o"></span></a>
                | <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')" class="btn btn-customized btn-default" title="Delete User"><span class="fa fa-trash-o"> </span></button>           
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
		{{ $items->links() }}
	@else
		<h3>No Users</h3>
		<a href="{{ URL::to('admin/users/create') }}" class="btn btn-primary">Add User</a>
	@endif
</div>	
@stop