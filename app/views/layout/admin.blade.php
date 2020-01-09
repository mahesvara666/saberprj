<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta charset="utf-8">
        <title>{{ $title }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Jessie Tarrosa">

        <link rel="stylesheet" href="{{ URL::asset('/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/assets/css/dataTables.bootstrap.css') }}"> 
        <link rel="stylesheet" href="{{ URL::asset('/assets/css/dataTables.responsive.css') }}"> 
        <link rel="stylesheet" href="{{ URL::asset('/assets/css/ripples.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/css/font-awesome.css') }}"> 
        <link rel="stylesheet" href="{{ URL::asset('/assets/css/sb-admin-2.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/assets/css/metisMenu.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/assets/css/timeline.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/assets/css/morris.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/assets/css/material-wfont.css') }}">
        <link href="{{ URL::asset('/assets/css/dashboard.css') }}" rel="stylesheet">
        <link rel="shortcut icon" href="{{ URL::asset(  '/assets/img/icon12.png' ) }}">    
        <style type="text/css">
        html,body {
            background: url("{{URL::asset('assets/img/icon4.gif');}}");
            background-size: cover;

                }
        .heading {
            color: #dfdfdf;
            text-shadow: 5px 5px 4px #000000;
        }
        .labels {
            color: #dfdfdf;
            text-shadow: 3px 3px 10px #000000;
        }
        .foot {
            color: #8f8f8f;
        }
        </style>
        @yield('extra-css')



        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <style>
        #floating-action-button .btn {
            margin: 20px;
        }
        #floating-action-button h2 {
            padding: 14px;
            margin: 0;
            font-size: 16px;
            font-weight: 400;
        }

        .btn-customized 
        {
            padding: 1px 5px 1px 5px !important;
            margin: 0 !important;
            border-radius: 14px;
        }
        #toggle-button h2 {
                  font-size: 18.7199993133545px;
                  font-weight: bold;
                  margin-bottom: 30px;
                  margin-top: 50px;
                }
                #toggle-button .togglebutton label {
                  margin: 20px 10px;
                  width: 200px;
                }
                #toggle-button .togglebutton .toggle {
                  float: right;
                }
    </style>
    <body>
    <nav class="navbar navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <li class="active"><a class="navbar-brand" href="{{ URL::to('admin') }}">{{ $title }}</a></li>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="fa fa-edit fa fw" title="Diagnosis">&nbsp; Diagnosis</span></a>
          <ul class="dropdown-menu" role="menu">
            <li class="active"><a href="{{ URL::to('admin/diagnosis') }}">Diagnosis</a></li>
            <li><a href="{{ URL::to('admin/diagnosis/create') }}">Add Diagnosis</a></li>
          </ul>
        </li>
        <li class="dropdown">
        <a href="{{ URL::to('admin/patient') }}"> <span class="fa fa-male" title="Patient"></span><span class="fa fa-female" title="Patient">&nbsp; Patient</span></a>
          <ul class="dropdown-menu" role="menu">
          </ul>
        </li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="fa fa-medkit" title="Medicine">&nbsp; Medicine</span></a>
          <ul class="dropdown-menu" role="menu">
            <li class="active"><a href="{{ URL::to('admin/medicine') }}">Medicine</a></li>
            <li><a href="{{ URL::to('admin/medicine/create') }}">Add Medicine</a></li>
          </ul>
        </li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user" title="{{Auth::user()->username}}"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li class="active"><a href="{{ URL::to('admin/users') }}"><span class="fa fa-user fa fw"></span>&nbsp; Account Managements</a></li>
            <li><a href="{{ URL::to('admin/bachelor') }}"><span class="fa fa-bookmark-o fa fw"></span>&nbsp; Curriculum</a></li>
            <li><a href="{{ URL::to('about') }}"><span class="fa fa-paperclip fa fw"></span>&nbsp; About</a></li>
            <li role="presentation" class="divider"></li>
            <li><a href="{{ URL::to('logout') }}"><span class="fa fa-sign-out fa fw"></span>&nbsp; Logout</a></li>
            </ul>
        </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">

        
        <div class="container">
            <br />
            <br />
            @if ( Session::has('success_message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <p>{{ Session::get('success_message') }}</p>
                </div>
            @elseif ( Session::has('notif_message'))
                <div class="alert alert-primary">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <p>{{ Session::get('error_message') }}</p>
                </div>
            @elseif ( Session::has('error_message'))
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <p>{{ Session::get('error_message') }}</p>
                </div>
            @endif
        </div>
        @yield('body')

    </div>
    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/material.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/ripples.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/angular.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/sb-admin-2.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/metisMenu.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/morris-min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/raphael-min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.dataTables.min.js') }}"></script>
    @yield('extra-js')

        <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
    </body>
</html>
