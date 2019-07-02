<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <title>BankAPP</title>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <style>
    .dataTables_wrapper .dataTables_processing {
        margin: auto;
        border: 5px solid #f3f3f3;
        border-radius: 50%;
        border-top: 5px solid blue;
        width: 60px;
        height: 60px;
        -webkit-animation: spin 1s linear infinite; /* Safari */
        animation: spin 1s linear infinite;
        }
        /* Safari */
    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    </style>
</head>
<body  class="bg-dark">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light primary-color bg-light">
            <h2 class="navbar-brand" style="margin: 10px;"><u>Clients Info List</u></h2>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link mr-sm-2" href="{{url('/')}}">
                           <b> List </b>
                        </a>
                </li>
                @guest
                    <li class="nav-item active">
                        <a class="nav-link mr-sm-2" href="{{ route('login') }}"><b>{{ __('Login') }}</b></a>
                    </li>
                @else
                <li class="nav-item active">
                    <a class="nav-link mr-sm-2" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                          <b>{{ __('Logout') }}</b>
                    </a>
                </li>
                    <form id="logout-form"  action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                    </form>
                @endguest
                </ul>
            </div>
            <br>
        </nav>

            @yield('content')
        
    </div>
    <footer><div class="footer-copyright text-center text-light py-3">© Copyright 2019 Kacper Gmurczyk</div></footer>
    
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>
