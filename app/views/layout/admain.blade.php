
<html>
    <head>
        <title>{{ $title }}</title>
        <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap-multiselect.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/font-awesome.css') }}">
        @yield('extra-css')
    </head>

    <body>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        <a class="navbar-brand" href="{{ URL::to('admin') }}">{{ $title }}</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ URL::to('admin/books') }}">Books</a></li>
        <li><a href="{{ URL::to('admin/cat') }}">Book Categories</a></li>
        <li><a href="{{ URL::to('admin/borrowers') }}">Borrowers' Detail</a></li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->username }} <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{ URL::to('admin/users') }}">Account Managements (alpha)</a></li>
            <li><a href="{{ URL::to('about') }}">About</a></li>
            <li><a href="{{ URL::to('logout') }}">Logout</a></li>
          </ul>
        </li>
        </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    </nav>
    <div class="col-md-12">
        <div class="col-md-4">
            <h2>Recent Book Borrowed <small>[<a href="{{ URL::to('admin/return') }}">view all</a>]</small></h2>
            
            @if(!empty($borrowed[0]))
            <table class="table table-striped">
                <tbody>
                    @foreach($borrowed as $borrow)
                        <tr>
                            <td>
                        <p><small> <b>{{ $borrow['book'][0]['title']." (".$borrow['book'][0]['publicationYear'].") </b> by ".$borrow['book'][0]['author'] }} </small></p>
                        <p><small> Borrowed on: {{ $borrow['timeBorrowed'] }}</small></p>
                        <p><small> Borrowed by: {{ $borrow['borrower'][0]['fullname'] }}</small></p>
                        {{ Form::open(['url' => 'admin/return/'.$borrow['id'], 'method' => 'POST']) }}
                            {{ Form::submit('Return Book',['class' => 'btn btn-success']) }}
                        {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <p>No Books Borrowed.</p>
            @endif
        </div>
        <div class="col-md-8">
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

            @yield('body')
        </div>
    </div>
    </body>


    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap-multiselect.js') }}"></script>
    @yield('extra-js')
</html>