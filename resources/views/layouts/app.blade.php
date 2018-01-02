<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script src="{{ asset('awesome-grid-master/awesome-grid.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,400i,700&amp;subset=latin-ext" rel="stylesheet">

    <!-- Styles -->
    <style>

    </style>


</head>
<body>
<span style="display: none">
</span>
<nav class="navbar navbar-default navbar-static" id="navbar-example">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="collapsed navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-example-js-navbar-collapse"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>


        <a href="/sk/" class="navbar-brand">H-Tool</a></div>
        <div class="collapse navbar-collapse bs-example-js-navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="drop1" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Taks <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="drop1">
                        <li>
                            <a href="/sk/listall">List all </a>
                        </li>
                        <li>
                            <a href="/sk/task/create">Create new</a>
                        </li>
                        <li>
                            <a href="/sk/archive">Archive</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" id="drop2" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Invoice <span class="caret"></span> </a>
                    <ul class="dropdown-menu" aria-labelledby="drop2">
                        <li>
                            <a href="/sk/invoice/listall">List invoices</a>
                        </li>
                        <li>
                            <a href="/sk/invoice/create">Create new invoice</a>
                        </li>
                        <li>
                            <a href="/sk/customer/listall">List customers</a>
                        </li>
                        <li>
                            <a href="/sk/customer/create">Create new customer</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    @if (isset($_SESSION["isLogged"]))
                        <a class="nav-link" href="/sk/logout">Logout</a>

                    @else
                        <a class="nav-link" href="/sk/login">Login</a>

                    @endif

                </li>
            </ul>

        </div>
    </div>
</nav>


@yield('content')

</body>
<footer>

</footer>
</html>
