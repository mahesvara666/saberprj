@extends('layout.admin')

@section('body')
<div class="container">
<h2><b><font color="white">Patient Information</b></font></h2>

<a href="{{ URL::to('admin/patient') }}" class="btn btn-warning"><span class="glyphicon glyphicon-home"></span></a> &nbsp;
{{ Form::open(array('url' => 'admin/patient/'.$item['id'], 'class' => 'form-signin', 'method' => 'PUT')) }}
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

        <label for="updated_at" >Created at: </label>
        {{ $item['updated_at'] }}
        <br/>

        <label for="first_name" >First Name: </label>
        {{ $item['first_name'] }}
        <br/>

        <label for="middle_name" >Middle Name: </label>
        {{ $item['middle_name'] }}
        <br/>
      
        <label for="last_name" >Last Name: </label>
        {{ $item['last_name'] }}
        <br/>

        <label for="bachelor_id">Course: </label>
        {{ \Bachelor::find($item['bachelor_id'])->description }}
        <br/>

        <label for="address" >Address: </label>
        {{ $item['address'] }}
        <br/>

        <label for="age" >Age: </label>
        {{ $item['age'] }}
        <br />
        
        <label for="gender" >Gender: </label>
        {{ $item['gender'] }}
        <br />               
        
        <label for="weight" >Weight: </label>
        {{ $item['weight'] }}
        <br />

        <label for="blood_type" >Blood Type: </label>
        {{ $item['blood_type'] }}
        <br />

        <label for="adviser" >Adviser: </label>
        {{ $item['adviser'] }}
        <br />
    </div>
    </div>
    
    <div class="panel panel-info">
    <div class="panel-heading">
    <h3>Vital Signs</h3>
    </div>
    <div class="panel-body">

        
        <label for="blood_pressure" >Blood Presssure: </label>
        {{ $item['blood_pressure'] }}
        <br />

        <label for="temperature" >Temperature: (Celsius)</label>
        {{ $item['temperature'] }}
        <br />
        
        
    </div>
    </div>
    <div class="panel panel-info">
    <div class="panel-heading">
    <h3>Check-up History</h3>
    </div>
    <div class="panel-body">
        <div class="dataTable_wrapper">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <th>Date and Time</th>
            <th>Complaints</th>
            <th>Finding</th>
            <th>Medicine</th>
            <th>Medicine Received</th>
        </thead>

        <tbody>

            @foreach($item->diagnosis()->get() as $sickfuck)
            <tr>
            <td>{{ $sickfuck->created_at }}</td>
            <td>{{ $sickfuck->complaints}}</td>
            <td>{{ $sickfuck->findings }}</td>
            <td>
            @foreach($sickfuck->medicine()->get() as $m)
                    <span class="label label-success">{{ $m->brand_name}}</span>
            @endforeach
            </td>
            <td>
                {{ $sickfuck->medicine_receive}}
            </td>
            </tr>
            @endforeach 
        </tbody> 
        </thead>
        </table>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

{{ Form::close() }}
@stop

@section('extra-js')

@stop