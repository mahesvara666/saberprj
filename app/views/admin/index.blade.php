@extends('layout.admin')

@section('body')
<div class="container">
<h2></h2>

      <center><div class="page-header">
        <a href="{{ URL::to('admin') }}"> <h1><b><font color="black">CTU TUBURAN CAMPUS CLINIC PATIENT RECORDS</font></b></h1></a>
      </div>
<div class="row">       
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-edit fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Diagnosis</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ URL::to('admin/diagnosis') }}"> 
                            <div class="panel-footer">
                                <span class="pull-left">Click Here</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-male fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Patients</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ URL::to('admin/patient') }}"> 
                            <div class="panel-footer">
                                <span class="pull-left">Click Here</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-medkit fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Medicine</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ URL::to('admin/medicine') }}"> 
                            <div class="panel-footer">
                                <span class="pull-left">Click Here</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bookmark-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Course</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ URL::to('admin/bachelor') }}"> 
                            <div class="panel-footer">
                                <span class="pull-left">Click Here</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
      </center>
</div>
@stop
