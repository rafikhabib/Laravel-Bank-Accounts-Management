<?php /* 
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
*/ ?> 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'Laravel') }}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          @if (!auth::guest())
          <ul class="navbar-nav mr-auto">
              <li><a class="nav-item nav-link "href="/dsibank/public">Home <span class="sr-only">(current)</span></a></li>
              <li><a class="nav-item nav-link" href="/dsibank/public/services">Services</a></li>
              <li><a class="nav-item nav-link" href="/dsibank/public/about">About</a></li>
              <li><a class="nav-item nav-link" href="/dsibank/public/clients">Clients</a></li>
              <li><a class="nav-item nav-link" href="/dsibank/public/comptes">Comptes</a></li>
              <li><a class="nav-item nav-link" href="/dsibank/public/compte">Comptes by AJAX</a></li>
          </ul>
          @endif

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
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                      document.getElementById('logout-form1').submit();" >{{ __('Logout') }}</a>
                                <form id="logout-form1" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                                </form>
                  </li>
              @endguest
          </ul>
      </div>
  </div>
</nav>