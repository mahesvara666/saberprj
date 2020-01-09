@extends('layout.admin')

@section('body')
<div class="container"><br />
<a href="{{ URL::to('admin/medicine') }}" class="btn btn-warning"><span class="glyphicon glyphicon-home"></span></a>
{{ Form::open(array('url' => 'admin/medicine', 'class' => 'form-signin')) }}
    @if( $errors->all() )
   <div class="alert alert-warning">
    @foreach($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
    </div>
    @endif
    <div class="panel panel-info">
    <div class="panel-heading">
    <h3>Medicine</h3>
    </div>
    <div class="panel-body">

        <label for="generic_name" >Category: </label>
        {{ Form::text('generic_name', Input::old('generic_name'), array('placeholder' => 'Category Name', 'class' => 'form-control')) }}

        <label for="brand_name" >Brand Name: </label>
        {{ Form::text('brand_name', Input::old('brand_name'), array('placeholder' => 'Brand Name', 'class' => 'form-control')) }}
        
        <label for="dose" >Dosage: </label>
        {{ Form::text('dose', Input::old('dose'), array('placeholder' => 'Dose', 'class' => 'form-control')) }}

        <label for="dose_unit" >Dosage Unit: </label>
        {{ Form::text('dose_unit', Input::old('dose_unit'), array('placeholder' => 'Dose Unit', 'class' => 'form-control')) }}

<!--    <label for="stock" >Stock: </label>
        {{ Form::text('stock', Input::old('stock'), array('placeholder' => 'Stock', 'class' => 'form-control')) }}

        <label for="stock_unit" >Stock Unit: </label>
        {{ Form::text('stock_unit', Input::old('stock_unit'), array('placeholder' => 'Stock Unit', 'class' => 'form-control')) }} -->
    </div>
    </div>
        {{ Form::submit('Create', array('class' => 'btn btn-lg btn-success btn-block')) }}
    </div>
{{ Form::close() }}
@stop