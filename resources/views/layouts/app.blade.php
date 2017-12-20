<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('awesome-grid-master/awesome-grid.min.js') }}"></script>

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,400,700" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>

    </style>


</head>
<body>
<span style="display: none">
    {{session_start()}}
</span>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="/sk/">SuperTask</a>
    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/sk/listall">List all </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/sk/task/create">Create new</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/sk/archive">Archive</a>
            </li>
            <li class="nav-item active">

                @if (isset($_SESSION["isLogged"]))
                    <a class="nav-link" href="/sk/logout">Logout</a>

                @else
                        <a class="nav-link" href="/sk/login">Login</a>

                @endif

            </li>
        </ul>
    </div>
</nav>



@yield('content')

</body>
<footer>

</footer>
</html>
