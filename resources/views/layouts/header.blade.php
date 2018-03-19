<nav>
    <div class="nav-wrapper">
      <a href="/" class="brand-logo">&nbsp;Sucofindo</a>
      <ul id="nav-mobie le" class="right hide-on-med-and-down">
        <li><a href="{{url('/allfile')}}">File</a></li>
        <li><a href="{{url('/files')}}">Data Tanggung Jawab</a></li>
        <li><a href="{{url('/members')}}">Data Anggota</a></li>

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            {{ csrf_field() }}
          </form>
        
      </ul>
    </div>
  </nav>