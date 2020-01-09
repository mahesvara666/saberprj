@extends('layout.admin')

@section('body')
<div class="container"><br />
<a href="{{ URL::to('admin/medicine') }}" class="btn btn-warning"><span class="glyphicon glyphicon-home"></span></a> &nbsp;
{{ Form::open(array('url' => 'admin/medicine/'.$item['id'], 'class' => 'form-signin', 'method' => 'PUT')) }}
    @if( $errors->all() )
   <div class="alert alert-warning">
    @foreach($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
    </div>
    @endif
    <div class="panel panel-info">
    <div class="panel-heading">
    <h3>Edit Medicine</h3>
    </div>
    <div class="panel-body">

        <label for="generic_name" >Category: </label>
        {{ Form::text('generic_name', $input = ($item['generic_name']) ? $item['generic_name'] :Input::old('generic_name'), array('placeholder' => 'Category Name', 'class' => 'form-control')) }}

        <label for="brand_name" >Brand Name: </label>
        {{ Form::text('brand_name', $input = ($item['brand_name']) ? $item['brand_name'] : Input::old('brand_name'), array('placeholder' => 'Brand Name', 'class' => 'form-control')) }}
                
        <label for="dose" >Dose: </label>
        {{ Form::text('dose', $input = ($item['dose']) ? $item['dose'] : Input::old('dose'), array('placeholder' => 'Dose', 'class' => 'form-control')) }}

        <label for="dose_unit" >Dose Unit: </label>
        {{ Form::text('dose_unit', $input = ($item['dose_unit']) ? $item['dose_unit'] : Input::old('dose_unit'), array('placeholder' => 'Dose Unit', 'class' => 'form-control')) }}

    </div>
    </div>
        {{ Form::submit('Update', array('class' => 'btn btn-lg btn-success btn-block')) }}
    </div>
{{ Form::close() }}
@stop