<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <style>
    body {
      margin: 0;
      font-family: "Lato", sans-serif;
      background-color:#f8fafc;
    }

    .sidebar {
      margin: 0;
      padding: 0;
      width: 200px;
      background-color: #f1f1f1;
      position: fixed;
      height: 100%;
      overflow: auto;
    }

    .sidebar a {
      display: block;
      color: black;
      padding: 16px;
      text-decoration: none;
    }
    
    .sidebar a.active {
      background-color: #4CAF50;
      color: white;
    }

    .sidebar a:hover:not(.active) {
      background-color: #555;
      color: white;
    }

    div.content {
      margin-left: 200px;
      /* padding: 1px 16px;
      height: 1000px; */
    }

    @media screen and (max-width: 700px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }
      .sidebar a {float: left;}
      div.content {margin-left: 0;}
    }

    @media screen and (max-width: 400px) {
      .sidebar a {
        text-align: center;
        float: none;
      }
    }

    .hero-header img{
      width:400px;
    }
    .hero-header{
      background: lightblue;
    }
    @media screen and (max-width: 500px) {
      
      .hero-header img {
          width: 176px!important;
      }
    }
    .loader {
        position: fixed;
        z-index: 999999;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .loader > img {
        width: 100px;
    }
    .loader.hidden {
        animation: fadeOut 1s;
        animation-fill-mode: forwards;
    }
    @keyframes fadeOut {
        100% {
            opacity: 0.5;
            visibility: hidden;
        }
    }
</style>
</head>
<body>

  <div class="hero-header sticky-top">
    
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <a class="navbar-brand" href="{{ url('/') }}">
        {{-- {{ config('app.name', 'Home') }} --}}
        <img src = "{{ asset('assets/Packagingo-Horizontal-version.png') }}" />
      </a>
      <div class="container">
          
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <span class="navbar-toggler-icon"></span>
          </button>
  
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->
              <ul class="navbar-nav mr-auto">
  
              </ul>
  
              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">
                  <!-- Authentication Links -->
                  @guest
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                      </li>
                      @if (Route::has('register'))
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                      @endif
                  @else
                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>
  
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>
  
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                          </div>
                      </li>
                  @endguest
              </ul>
          </div>
      </div>
    </nav>
    
  </div>
    <div class="loader" style="display:none;">
        <img src="{{asset('assets/loading.gif')}}" alt="Loading...">
    </div>
    <div class="sidebar" id="myDIV">
      @guest
        {{-- <a class="" href="/huace">Sample album</a> --}}
        <a class="" href="/waleng">Corrugated Box</a>
        <a href="/caihe">Paper Box</a>  
        <a href="/diaopai">Label</a>
        <a href="/taili">Desk calendar</a>
        <a class="" href="/userbubble">Bubble Mailer Bag</a>
        <a href="/userpoly">Poly Mailer Bag</a>  
      @else
        <a class="" href="/bubble">Bubble Mailer Bag</a>
        <a href="/poly">Poly Mailer Bag</a> 
        <a href="/paperbox">Paper Box</a>   
        <a href="/mailerbox">Mailer Box</a>         
      @endguest
    </div>
    <div class="content mt-5">
      @yield('content')
    </div>
    </div>
    
    
</body>
<script>
  $(document).ready(function() {
    $('#myDIV a').removeClass('active');
    if(location.pathname.split("/")[1] != '')
      $('#myDIV a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
    else
      $($('#myDIV').find('a')[0]).addClass('active');  
  });
</script>
</html>