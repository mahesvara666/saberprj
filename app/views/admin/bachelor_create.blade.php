@extends('layout.admin')

@section('body')
<div class="container">    
<br />
<a href="{{ URL::to('admin/bachelor') }}" class="btn btn-warning"><span class="glyphicon glyphicon-home"></span></a> &nbsp;
{{ Form::open(array('url' => 'admin/bachelor', 'class' => 'form-signin')) }}
    @if( $errors->all() )
   <div class="alert alert-warning">
    @foreach($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
    </div>
    @endif
    <div class="panel panel-info">
    <div class="panel-heading">
    <h3>Add Curriculum</h3>
    </div>
    <div class="panel-body">
        <label for="code" >Bachelor Degree Code: </label>
        {{ Form::text('code', Input::old('code'), array('placeholder' => 'Bachelor Degree Code', 'class' => 'form-control')) }}
        
        <label for="description" >Bachelor Degree Description / Full Bachelor Degree: </label>
        {{ Form::text('description', Input::old('description') , array('placeholder' => 'Bachelor Degree Description', 'class' => 'form-control')) }}
            <label for="year"> Year Level: </label>
            {{ Form::text('year', Input::old('year') ,array('class' => 'form-control')) }}
            <label for="section"> Section: </label>
            {{ Form::text('section', Input::old('section') ,array('class' => 'form-control')) }}
    </div>
    </div>
        {{ Form::submit('Create', array('class' => 'btn btn-lg btn-success btn-block')) }}
    </div>
{{ Form::close() }}
@stop