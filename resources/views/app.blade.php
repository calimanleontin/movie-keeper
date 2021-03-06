<!DOCTYPE html>
<html lang="en"  ng-app="commentApp" ng-controller="mainController">
<head>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>--}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>--}}
    {{--facebook --}}

    {{--JQuery--}}

            <!-- JS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script> <!-- load angular -->

    <!-- ANGULAR -->
    <!-- all angular resources will be loaded from the /public folder -->

    <script type="text/javascript" src="/js/controllers/mainCtrl.js"></script>
    <script type="text/javascript" src="/js/services/commentService.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">


    <link rel="stylesheet"href="//codeorigin.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//codeorigin.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>


    <title>Movie Manager</title>
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li>
                    @if(!Auth::guest() and Auth::user()->is_admin())
                        <a href="{{ url('/auth/admin') }}">Admin panel</a>
                    @endif
                </li>

            </ul>
            <ul class="nav navbar-nav navbar-right list-inline">
                @if (Auth::guest())
                    <li>
                        <a href="{{ url('/auth/login') }}" class="l">Login</a>
                    </li>
                    <li>
                        <a href="{{ url('/auth/register') }}">Register</a>
                    </li>

                    <li>
                        <a href="{{ url('/auth/facebook') }}">Login with facebook</a>
                    </li>
            </ul>

            @else
                <li>
                    <a href="{{ url('/auth/logout') }}" >Logout</a>
                </li>
                <li>
                    <div class="mini">
                        <button class="btn btn-default dropdown-toggle " type="button" id="menu1" data-toggle="dropdown">{{Auth::user()->name}}
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                            <li>
                                <a href="{{ url('/auth/profile') }}">Profile</a>
                            </li>
                            @if(!Auth::guest() and Auth::user()->is_admin())
                                <li>
                                    <a href="/auth/createMovie">New Movie</a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </li>
                </ul>


            @endif
        </div>
    </div>
</nav>


<div class="container">
    @if (Session::has('message'))
        <div class="flash alert-info">
            <p class="panel-body">
                {{ Session::get('message') }}
            </p>
        </div>
    @endif
    @if ($errors->any())
        <div class='flash alert-danger'>
            <ul class="panel-body">
                @foreach ( $errors->all() as $error )
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="row">
        <div class="col-md-9 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>@yield('title')</h2>
                    @yield('title-meta')
                </div>
                <div class="panel-body">
                    @yield('content')
                </div>
            </div>
        </div>

        @if(!empty($categories))
            <div class="col-md-2 left ">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>@yield('category-title')</h2>
                        @yield('category-title-meta')
                    </div>
                    <div class="panel-body long">
                        @yield('category-content')
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<div id="footer">
    <div class="panel panel-default">
        <div class="panel-heading">
    Created by Caliman Leontin
    <br>
    Email: calimanleontin@gmail.com
            </div>
        </div>
</div>


</body>
</html>