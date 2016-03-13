<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sales Chain @yield('title')</title>
    <link rel="stylesheet" href="/css/all.css">

    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <b>SalesChain</b>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if (Auth::user())
                        <li class="Store"><a href="{{ url('/store') }}">Store</a></li>
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li class="Login"><a href="{{ url('/login') }}">Login</a></li>
                        <li class="Register"><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/profile') }}">
                                        <i class="glyphicon glyphicon-cog"></i> Account Settings
                                    </a>
                                </li>
                                
                                <li class="divider"></li>

                                <li>
                                    <a href="{{ url('/logout') }}">
                                        <i class="glyphicon glyphicon-log-out"></i> &nbsp;Logout
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
    
        @yield('content')
    </div>

    <!-- JavaScripts -->
    <script src="/js/frontend/all.js"> </script>
    <script>
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    </script>
    @yield('scripts')
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
