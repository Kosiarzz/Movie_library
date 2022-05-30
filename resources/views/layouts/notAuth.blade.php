<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name', 'Laravel') }}</title>

      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>

  <body>
      <div id="app">
          <nav class="navbar navbar-expand-md navbar-light shadow-sm fixed-top d-flex justify-content-between" style="background:rgba(33, 33, 33, 0.99);">
            <a class="navbar-brand text-white" style="margin-left:30px;" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            
            <div class="" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav in-line">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login') && request()->routeIs('register'))
                            <li class="nav-item" style="margin-right:35px;">
                                <a class="btn nav-link text-white" href="{{ route('login') }}">Logowanie</a>
                            </li>
                        @endif

                        @if (Route::has('register') && request()->routeIs('login'))
                            <li class="nav-item" style="margin-right:35px;">
                                <a class="btn nav-link text-white" href="{{ route('register') }}">Rejestracja</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown" style="margin-right:35px;">
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="background:rgba(33, 33, 33, 0.99);">
                                <a class="dropdown-item" style="color:#fff!important;" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                    Wyloguj
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
          </nav>
          <main style="padding-top:10rem;">
              @yield('content')
          </main>
      </div>
  </body>
</html>
