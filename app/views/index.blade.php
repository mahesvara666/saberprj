	@extends('layout.main')
  @section('extra-css')
<link rel="stylesheet" href="{{ URL::asset('assets/css/extra.css') }}"> 
	@stop
	@section('body')

		{{ Form::open(array('url' => 'login', 'class' => 'form-signin')) }}

        <font color="white"><h2 class="form-signin-heading" align="center">{{ $title }}</h2></font>

        @if ( $errors->first('username') || $errors->first('password'))
        <div class="alert alert-warning">	
 	          <p>{{ $errors->first('username') }}</p>
		        <p>{{ $errors->first('password') }}</p>
		    </div>
		    @endif
        <label for="username" >Username: </label>
        {{ Form::text('username', Input::old('username'), array('placeholder' => 'Your Username', 'class' => 'form-control')) }}
        <label for="password" >Password: </label>
        {{ Form::password('password', array('placeholder' => 'Your Password', 'class' => 'form-control')) }}
        <br />
        {{ Form::submit('Log In', array('class' => 'btn btn-lg btn-success btn-block')) }}
        <div>
        <small class="pull-right foot">&copy; Saber Project 2015</small>
        </div>
      {{ Form::close() }}
	@stop

  @section('extra-js')
  <script type="text/javascript" src="{{ URL::asset('assets/js/ng-starter.js') }}"></script>
  @stop