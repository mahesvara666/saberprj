@extends('layout.admin')

@section('extra-css')

        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/chosen/chosen.css') }}">
@stop
@section('body')
<div class="container"><br />

<a href="{{ URL::to('admin/diagnosis') }}" class="btn btn-warning"><span class="glyphicon glyphicon-home"></span></a> &nbsp;
{{ Form::open(array('url' => 'admin/diagnosis', 'class' => 'form-signin')) }}
    @if( $errors->all() )
   	<div class="alert alert-warning">
    @foreach($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
    </div>
    @endif
    <div class="panel panel-info">
    <div class="panel-heading">
    <h3>Diagnosis</h3>
    </div>
    <div class="panel-body">
    <label for="patient_id" >Patient Name: </label>
    {{ Form::select('patient_id', $patient_id, '', ['class' => 'chosen-select-no-results', 'placeholder' => 'Name', 'style' => "width:100%;"]) }}<br />
    
    <label for="complaints" >Complaints: </label>
    {{ Form::text('complaints','', array('placeholder' => 'Complaints', 'class' => 'form-control')) }}

	  <label for="findings" >Findings: </label>
    {{ Form::text('findings','', array('placeholder' => 'Findings', 'class' => 'form-control')) }}

    <label for="medicine_id" >Medicine: </label>
    {{ Form::select('medicine_id[]', $medicine_id, '', ['class' => 'chosen-select-no-results', 'data-placeholder' => 'Medicine', 'multiple' => 'multiple', 'style' => "width:100%;"]) }}<br />

    <label for="medicine_receive" >Medicine Received: </label>
    {{ Form::text('medicine_receive','', array('placeholder' => 'No. of Medicine Received', 'class' => 'form-control')) }}
    
    <label for="session" >Intake: </label>
    {{ Form::text('session','', array('placeholder' => 'intake per day', 'class' => 'form-control')) }}
    </div>
    </div>     
    {{ Form::submit('Create', array('class' => 'btn btn-lg btn-success btn-block')) }}

    </div>

 {{ Form::close() }}
@stop

@section('extra-js')
 <script type="text/javascript" src="{{ URL::asset('assets/chosen/chosen.jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/chosen/chosen.proto.min.js') }}"></script>
     <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>
  @stop