<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                   <ul class="nav nav-tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#">Home</a>
                        </li>
                         
                          <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Forum</a>
                          <ul class="dropdown-menu">
                           <li> <a class="nav-link" href="/threads">Brows Fourm</a> </li>
                           @if(auth()->check())
                           <li> <a class="nav-link" href="/threads?by={{auth()->user()->name}}">My forum</a></li>
                           @endif
                           <li> <a  class="nav-link" href="/threads?popular=1">Popular</a></li>
                          </ul>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Forum Category</a>
                          <ul class="dropdown-menu">
                            @foreach($channels as $channel)
                             <li> <a href="/threads/{{$channel->slug}}">{{$channel->name}}</a> </li>
                            @endforeach
                          </ul>
                        </li>
                         <li class="nav-item">
                          <a class="nav-link disabled" href="/threads/create">Create forum</a>
                        </li>
                          </li>
                          <li class="nav-item">
                          <a class="nav-link disabled" href="#">Membership</a>
                        </li>
                          <li class="nav-item">
                          <a class="nav-link disabled" href="#">Contact</a>
                        </li>
                    </ul>

                  

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <li> <a class="dropdown-item" href="{{route('profile', Auth::user())}}"> My profile </a></li>
                                  <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                  </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
