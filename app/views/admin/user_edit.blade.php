@extends('layout.admin')

@section('body')
<div class="container">
<br />
<a href="{{ URL::to('admin/users') }}" class="btn btn-danger"><span class="glyphicon glyphicon-home"></span></a> &nbsp;
{{ Form::open(array('url' => 'admin/users/'.$item['id'], 'class' => 'form-signin', 'method' => 'PUT')) }}
    @if( $errors->all() )
   <div class="alert alert-warning">
    @foreach($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
    </div>
    @endif
    <div class="panel panel-info">
    <div class="panel-heading">
    <h3><b><font color="white">User</font></b></h3>
    </div>
    <div class="panel-body">
        <label for="username" >Username: </label>
        {{ Form::text('username', $input = ($item['username'] ? $item['username'] : Input::old('username') ), array('placeholder' => 'UserName', 'class' => 'form-control')) }}
        
        <label for="password" >Password: </label>
        {{ Form::password('password', array('placeholder' => 'Password', 'class' => 'form-control')) }}
 
        <label for="fullname" >Full Name: </label>
        {{ Form::text('fullname', $input = ($item['fullname'] ? $item['fullname'] : Input::old('fullname') ), array('placeholder' => 'Full Name', 'class' => 'form-control')) }}
        
        <label for="email" >Email: </label>
        {{ Form::text('email', $input = ($item['email'] ? $item['email'] : Input::old('email') ), array('placeholder' => 'Email', 'class' => 'form-control')) }}
</div>
</div>
        {{ Form::submit('Update', array('class' => 'btn btn-lg btn-success btn-block')) }}
</div>
{{ Form::close() }}
@stop