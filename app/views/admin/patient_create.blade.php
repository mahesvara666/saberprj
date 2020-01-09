@extends('layout.admin')

@section('body')
<div class="container">
<h2><b><font color="white">Patient</b></font></h2>

<a href="{{ URL::to('admin/patient') }}" class="btn btn-warning"><span class="glyphicon glyphicon-home"></a> &nbsp;
{{ Form::open(array('url' => 'admin/patient', 'class' => 'form-signin')) }}
    @if( $errors->all() )
   <div class="alert alert-warning">
    @foreach($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
    </div>
    @endif
    <div class="panel panel-info">
    <div class="panel-heading">
    <h3>Personal Information</h3>
    </div>
    <div class="panel-body">
        <label for="first_name" >First Name: </label>
        {{ Form::text('first_name', Input::old('first_name'), array('placeholder' => 'First Name', 'class' => 'form-control')) }}
        
        <label for="middle_name" >Middle Name: </label>
        {{ Form::text('middle_name', Input::old('middle_name'), array('placeholder' => 'Middle Name', 'class' => 'form-control')) }}

        <label for="last_name" >Last Name: </label>
        {{ Form::text('last_name', Input::old('last_name'), array('placeholder' => 'Last Name', 'class' => 'form-control')) }}

        <label for="bachelor_id">Course Year and Section </label>
        {{ Form::select('bachelor_id', $bachelor, Input::old('bachelor_id') , ['class' => 'form-control']) }}

        <label for="address" >Address: </label>
        {{ Form::text('address', Input::old('address'), array('placeholder' => 'Address', 'class' => 'form-control')) }}

        <label for="age" >Age: </label>
        {{ Form::text('age', Input::old('age'), array('placeholder' => 'Age', 'class' => 'form-control')) }}
        
        <label for="gender" >Gender: </label>
        {{ Form::text('gender', Input::old('gender'), array('placeholder' => 'Gender', 'select class' => 'form-control')) }}
        
        <label for="weight" >Weight: (Kilograms)</label>
        {{ Form::text('weight', Input::old('weight'), array('placeholder' => 'Weight', 'class' => 'form-control')) }}

        <label for="blood_type" >Blood Type: </label>
        {{ Form::text('blood_type', Input::old('blood_type'), array('placeholder' => 'Blood Type', 'class' => 'form-control')) }}


        <label for="adviser" >Adviser: </label>
        {{ Form::text('adviser', Input::old('adviser'), array('placeholder' => 'Adviser', 'class' => 'form-control')) }}
    </div>
    </div>
    <div class="panel panel-info">
    <div class="panel-heading">
    <h3>Vital Signs</h3>
    </div>
    <div class="panel-body">

        <label for="blood_pressure" >Blood Presssure: </label>
        {{ Form::text('blood_pressure', Input::old('blood_pressure'), array('placeholder' => 'Blood Pressure', 'class' => 'form-control')) }}

        <label for="temperature" >Temperature: (Celsius)</label>
        {{ Form::text('temperature', Input::old('temperature'), array('placeholder' => 'Temperature', 'class' => 'form-control')) }}
    </div>
    </div>
    
        {{ Form::submit('Create', array('class' => 'btn btn-lg btn-success btn-block')) }}
    </div>

{{ Form::close() }}
@stop

@section('extra-js')

@stop