<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<head>
   

    <title>Monitoring Divisi Umum</title>

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/all-landing.css') }}" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

</head>

<body data-spy="scroll" data-target="#navigation" data-offset="50">

    <div id="app" v-cloak>
        <!-- Fixed navbar -->
        <div id="navigation" class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <ul class="nav navbar-nav">
                        <li style="font-size: 21px;" class="active"><a href="#home" class="smoothScroll"><b>Inventory'10</b></a></li>
                    </ul>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#home" class="smoothScroll">Beranda</a></li>
                        <li><a href="#desc" class="smoothScroll">Depskripsi</a></li>
                        <li><a href="#contact" class="smoothScroll">Kontak Kami</a></li>
                        @if(Auth::guest())
                        <li style="margin-left: 610px;" ><a href=" {{ url('/login')}}">Masuk</a></li>
                        @else
                        <li style="margin-left: 498px;" class="dropdown right">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu" style="width: 10px; height: 150px;">
                            <li><a href=" {{url('/profiles')}}"><i class="fa fa-btn fa-user"></i>Profile</a></li>
                            <li><a href=" {{url('/logout')}}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                    @endif 
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
    
    <section id="home" name="home">
        <div id="headerwrap">
            <div class="container">
                <div class="row centered">
                    <div class="col-lg-12">
                        <h1>Monitoring <b> <a href="http://sucofindo.co.id/">Divisi Umum</a></b></h1><br>
                        <h3> Jakarta Selatan, <a href="http://sucofindo.co.id/">PT Sucofindo(Persero)<br></a>
                            Mudah, Cepat, dan Simple:)
                            <h3><a style="margin-right: 55px;" href="{{ url('/login') }}" class="btn btn-lg btn-success">Kuy Gabung !</a></h3>
                        </div>
                        <div class="col-lg-2">

                        </div>
                        <div class="col-lg-8">
                            <center><img style="width: 330px; border-radius: 10px; height: 300px; " class="img-responsive" src="{{ asset('/img/sucofindo.jpg') }}" alt=""></center>
                        </div>
                        <div class="col-lg-2">
                            
                        </div>
                    </div>
                    <center><h2><a href="http://sucofindo.co.id">Sucofindo-</a></h2></center><br>
                </div> <!--/ .container -->
            </div><!--/ #headerwrap -->
        </section>

        <section id="desc" name="desc">
            <!-- INTRO WRAP -->
            <div id="intro">
                <div class="container">
                    <div class="row centered">
                        <hr>
                        <div class="col-lg-5">
                            <img src="{{ asset('/img/intro01.png') }}" alt="">
                            <h3>Pendataan Barang.</h3>
                            <p>Menambah, Mengedit, dan juga Menghapus data Barang pada Dashboard Admin.</p>
                        </div>
                        <div class="col-lg-7">
                            <img src="{{ asset('/img/intro03.png') }}" alt="">
                            <h3>Memantau Peminjaman.</h3>
                            <p>Melihat Statistik Peminjaman perbulannya ataupun pertahunnya.</p>
                        </div>
                        <div class="col-lg-5s">
                            <img src="{{ asset('/img/intro02.png') }}" alt="">
                            <h3>Lengkap dengan Tanggal&Waktu.</h3>
                            <p>Pada saat Pengembalian Barang, Waktu Otomatis akan terisi setelah barang diKembalikan</p>                       
                        </div>
                    </div>
                    <hr>
                </div> 
            </div>                            
        </div>
    </div>
</div>
</div>
</div>
</section>
<section id="contact" name="contact">
    <div id="footerwrap">
        <div class="container">
            <div class="col-lg-5">
                <h3>Alamat</h3>
                <p>
                   <b>PT Sucofindo(Persero)</b><br/>
                   Jl. Raya Pasar Minggu No.44, RT.2/RW.7 <br/>
                   Duren Tiga, Pancoran  Jakarta Selatan <br/>
                   Daerah Khusus Ibukota Jakarta 12760,<br/> 
                   Indonesia.
               </p>
           </div>

           <div class="col-lg-7">
            <h3>Kiriman Masukan/Saran untuk Web ini:)</h3>
            <br>
            <form method="POST" action=" {{route('contactme')}} " >
               {!! csrf_field() !!}
               <div class="form-group">
                <label for="name1">Nama</label>
                <input type="name" name="name" class="form-control" id="name1" placeholder="Nama Lengkap" required>
            </div>
            <div class="form-group">
                <label for="email1">Alamat Email</label>
                <input type="email" name="email" class="form-control" id="email1" placeholder="E-Mail" required>
            </div>
            <div class="form-group">
                <label>Subject</label>
                <input type="text" name="subject" class="form-control" placeholder="Subject" required>
            </div>
            <div class="form-group">
                <label>Message</label>
                <textarea class="form-control" placeholder="Message" name="message" rows="3" required></textarea>
            </div>
            <div class="form-group">
                {!! app('captcha')->display() !!}

                @if ($errors->has('g-recaptcha-response'))
                <span class="help-block">
                  <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
              </span>
              @endif
      </div>
      <button style="padding-right:30px; font-size:15px;" type="submit" class="btn btn-large btn-success">Kirim</button>
  </form>
</div>
</div>
</div>
</section>
</div>

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ url (asset('/js/app-landing.js')) }}"></script>
    <script>
        $('.carousel').carousel({
            interval: 3500
        })
    </script>
</body>
</html>
