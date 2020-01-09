@extends('layout.admin')

@section('body')
<div class="container">
  <h2><b><font color="white">Curriculum</font></b></h2>
    <a href="{{ URL::to('admin') }}" class="btn btn-warning"><span class="fa fa-home fa fw"></span></a> &nbsp;
    <a href="{{ URL::to('admin/bachelor/create') }}" class="btn btn-info"><span class="fa fa-pencil"></span></a> &nbsp;

  <div class="row">
 <div class="col-lg-12">
   <div class="panel panel-info">
    <div class="panel-heading">
    Curriculum Lists
    </div>
  @if( !empty($data[0]) )
  <div class="panel-body">
       <div class="dataTable_wrapper">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr>
            <th></th>
            <th>Degree</th>
            <th>Description</th>
            <th>Year and Section</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          @foreach($data as $item)
          <tr>
            <th>{{$item['id']}}</th>
             <td>{{$item['code']}}</td>
             <td>{{$item['description']}}</td>
             <td>{{$item['year']." ".$item['section']}}</td>
             <td>
                {{ Form::open(array('url' => 'admin/bachelor'.'/'.$item['id'], 'method' => 'DELETE' )) }}
                <button type="submit" onclick="return confirm('Are you sure you want to delete this degree? This degree may be associated with diagnosis, patient, etc. deleting this degree may affect the associated items. Continue?')" class="btn btn-customized btn-default" title="Delete Bachelor">
                <span class="fa fa-trash-o"> </span>
                </button>           
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
 </div>
</div>    
        {{ $data->links() }}
  @else
    <center><h3>No Curriculum Exist ! ! !</h3></center>
    @endif

@stop