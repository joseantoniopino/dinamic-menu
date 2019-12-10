<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    <div id="app">
        @yield('h1')
        <nav class="navbar navbar-light navbar-expand-md justify-content-center">
            <button class="navbar-toggler ml-1" type="button" data-toggle="collapse" data-target="#collapsingNavbar2">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="collapsingNavbar2">
                <ul class="navbar-nav mx-auto text-center">
                    @if(true)
                        @foreach($menu as $item)
                            <li class="nav-item mx-5  @if(count($item['get_active_sub_menus']) > 0) dropdown @endif ">
                                <a class="nav-link @if(count($item['get_active_sub_menus']) > 0) dropdown-toggle @endif "
                                   @if(count($item['get_active_sub_menus']) > 0)
                                       data-toggle="dropdown"
                                   @endif
                                   href="#">{{$item['name']}}
                                </a>
                                @if(count($item['get_active_sub_menus']) > 0)
                                        <div class="dropdown-menu">
                                            @foreach($item['get_active_sub_menus'] as $submenu)
                                                @if($submenu['active'] == 1)
                                                    <a class="dropdown-item submenu-link" id="{{$submenu['name']}}" href="#">{{$submenu['name']}}</a>
                                                @endif
                                            @endforeach
                                        </div>
                                @endif
                            </li>
                        @endforeach
                    @endif
                </ul>

            </div>
        </nav>
        <main class="">
            @yield('content')
        </main>
    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
@yield('scripts')
</body>
</html>
