<nav>
    <div class="nav-wrapper">
      <a href="/home" class="brand-logo"><span style="margin-left: 15px;">DivisiUmum</span></a>
      <ul style="margin-right: 35px;" id="nav-mobie le" class="right hide-on-med-and-down">
        <li> <a href=" {{url('/')}} ">Halaman Utama</a></li>

        <li><a href="{{url('/peminjam')}}" class="smoothScroll">a</a></li>

<!--         <li><a href="{{url('/barang')}}">Data Barang</a></li>
        <li><a href="{{url('/siswa')}}">Data Siswa</a></li>
        <li><a href="{{url('/kelas')}}">Data Kelas</a></li> -->
        @if(Auth::guest())
          <li><a href=" {{ url('/login')}}">Masuk</a></li>
          <li><a href=" {{ url('/register')}} ">Daftar</a></li>
        @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img style="width:35px; height:35px; margin-:" src="/uploads/avatar/defaults.jpg" class="img-circle" alt="User Image" />
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <ul class="dropdown-menu" role="menu" >
                <li><a href=" {{url('/profiles')}}"><i class="fa fa-btn fa-user"></i>Profil</a></li><br>
                <li><a href=" {{url('/logout')}}"><i class="fa fa-btn fa-sign-out"></i>Keluar</a></li>
              </ul>
            </li>
          @endif
      </ul>
    </div>
  </nav>
