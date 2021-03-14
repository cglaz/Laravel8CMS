<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="{{route('home.index')}}">Laravel8CMS</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

          <li class="nav-item">
            <a class="nav-link" href=""></a>
          </li>

          @if (Route::has('login'))
                    @auth
                    <li class="nav-item">
                        <a href="{{ url('/admin') }}" class="nav-link">Admin</a>
                    </li>
                    @else
                        <li class="nav-item">
                             <a href="{{ route('login') }}" class="nav-link">Login</a>
                        <li class="nav-item">
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>
                        @endif
                    @endauth
            @endif
        </ul>
      </div>
    </div>
  </nav>
