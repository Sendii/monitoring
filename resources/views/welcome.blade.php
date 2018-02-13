<!DOCTYPE html>
<html>
<head>
    <title>
     Div-Sum
    </title>

   <style type="text/css">
       /* https://coolors.co/2c3e50-e74c3c-ffffff-3498db-95a3b3 */

/* ========================
Utilities
======================== */

* {
  box-sizing: border-box;
}

.cf::before,
.cf::after {
    content: "";
    display: table; 
}

.cf::after {
    clear: both;
}

html {
  position: relative;
}

img {
  max-width: 100%;
}

/* ========================
Global
======================== */

body {
  color: #444;
  font-family: Roboto, sans-serif;
  font-size: 18px;
  font-weight: 300;
  line-height: 1;
  margin: 0;
  padding: 0;
}

h1, h2, h3, h4, h5, h6, ul, ol, p {
  margin-top: 0;
}

h1 {
  font-weight: 900;
}

p {
  line-height: 1.5;
}

a, a:hover, a:focus, a:active, a:visited {
  color: #E74C3C;
  text-decoration: underline;
  font-family: Roboto;
  font-size: 20px;
}

/* ========================
Containers
======================== */

.container-fluid {
  padding: 0 1em;
}

.container {
  margin: 0 auto;
  max-width: 996px;
}

/* ========================
Navigation
======================== */

@keyframes show-header {
    0% {
        top: -4em;
        opacity: 0;
    }
    100% {
        top: 0;
        opacity: 1;
    }
}

nav {
  background-color: #fff;
  box-shadow: 0 2px 2px rgba(0,0,0,.45);
  position: relative;
  top: 0;
}

nav a, nav a:hover, nav a:focus,  nav a:active, nav a:visited {
  text-decoration: none;
}

nav .brand {
  display: inline-block;
  float: left;
  font-size: 1.25em;
  font-weight: 900;
}

nav .brand a {
  color: #444;
  display: block;
  padding: 1em 0;
}

nav .nav-toggle {
  color: #444;
  cursor: pointer;
  display: inline-block;
  float: right;
  font-size: 1.25em;
  padding: 1em 0;
  z-index: 1000
}

nav ul {
  border-top: 1px solid #ccc;
  clear: both;
  list-style: none;
  margin: 0 -1em;
  padding: 0;
  z-index: 999;
}

nav ul li {
  border-bottom: 1px solid #ccc;
  text-align: center;
}

nav ul li a {
  color: #444;
  display: block;
  padding: .75em;
}

nav.sticky {
  animation: show-header .5s ease;
  position: fixed;
  top: 0;
  width: 100%;
}

/* ========================
Sections
======================== */

.splash {
  background: linear-gradient(rgba(44, 62, 80, 0.65), rgba(52, 152, 219, 0.65)),
                url("http://pipnews.co.id/wp-content/uploads/2017/07/sucofindo-600x381.jpg") no-repeat fixed center;
    background-size: cover;
    color: #fff;
}

.splash .container {
  padding-top: 25vh; /* No JS fallback*/
  padding-bottom: 25vh; /* No JS fallback*/
}

.profile-image {
  border-radius: 50%;
  display: block;
  max-width: 200px;
  margin: 0 auto 1em;
  width: 100%;
}

.splash h1 {
  font-size: 3em;
  margin-bottom: .15em;
  text-align: center;
}

.splash .lead, .splash .continue {
  display: block;
  text-align: center;
}

.splash .lead {
  font-size: 1.5em;
  font-weight: 100;
  margin-bottom: 1em;
}

.splash .continue {
  font-size: 4em;
}

.splash .continue a {
  border: 4px solid #fff;
  border-radius: 100%;
  color: #fff;
  display: inline-block;
  text-decoration: none;
  width: 80px;
}
.splash .continue a:hover {
  background-color: rgba(255, 255, 255, .25);
}

.intro .container, .features .container, .portfolio .container, .contact .container {
  padding: 5em 0;
}

.intro, .features, .portfolio, .contact {
  text-align: center;
}

.intro {
  background-color: #E74C3C;
  color: #fff;
}

.intro a, .intro a:hover, .intro a:focus, .intro a:active, .intro a:visited {
  color: #fff;
}

.features img {
  display: block;
  margin: 0 auto 1em;
  max-width: 200px;
}

.features .col-3 {
  margin: 3em auto;
  width: 100%;
}

.portfolio {
  background-color: #3498DB;
  color: #fff;
}

.gallery .gallery-image {
  margin: 1em auto;
  width: 100%;
}

.gallery .gallery-image img {
  background-color: #23648F;
  border-radius: 4px;
  display: block;
  height: auto;
  padding: 6px;
  width: 100%;
}

.contact form {
  background-color: #f0f0f0;
  border-radius: 4px;
  border-top: 8px solid #E74C3C;
  box-shadow: 0 1px 2px rgba(0,0,0,.15);
  padding: 1em;
}

.contact form input, .contact form textarea {
  border: none;
  border-radius: 4px;
  display: block;
  margin-bottom: 1em;
  padding: 1em;
  width: 100%;
}

.contact form textarea {
  height: 6em;
}

.contact form input[type="submit"] {
  background-color: #E74C3C;
  border-radius: 0;
  color: #fff;
  padding: 1em;
  text-transform: uppercase;
}

/* ========================
Footer
======================== */

.footer {
  background-color: #2C3E50;
  color:  #fff;
  font-size: 1.5em;
  text-align: center;
}

.footer .container {
  padding: 1em 0;
}

.footer a {
  color: #fff;
  margin-right: 1em;
}

.footer a:last-of-type {
  margin-right: 0;
}

/* ========================
Media Queries
======================== */

@media (min-width: 768px) {
  
  nav .nav-toggle {
    display: none;
  }
  
  nav ul {
    border: none;
    clear: none;
    display: inline-block !important;
    float: right;
    margin: 0;
    padding: 25px 0;
  }
  
  nav ul li {
    border: none;
    display: inline-block;
    float: left;
    margin-right: 1.5em;
  }
  
  nav ul li:last-of-type {
    margin-right: 0;
  }
  
  nav ul li a {
    padding: 0;
  }
  
  .splash h1 {
    font-size: 6em;
  }
  
  .splash .lead {
    font-size: 3em;
  }
  
  .features .col-3 {
    float: left;
    margin: 2em 5% 0 0;
    padding: 0 1em;
    width: 30%;
  }
  
  .features .col-3:last-of-type {
    margin-right: 0;
  }
  
  .gallery .gallery-image {
    float: left;
    margin-right: 2.5%;
    width: 31.6666666667%;
  }
  
  .gallery .gallery-image:nth-of-type(3n) {
    margin-right: 0;
  }
  
  .contact form {
    padding: 3em 2em 2em;
  }
  
  .contact form input[type="submit"] {
    padding: 1em 3em;
    width: auto;
  }
  
  .contact form input.full-half {
    float: left;
    margin-right: 2.5%;
    width: 48.75%;
  }
  
  .contact form input.full-half:nth-of-type(2n) {
    margin-right: 0;
  }
  
  .contact form textarea {
    height: 12em;
  }
  
}
   </style> 
</head>
<body>
<nav class="container-fluid nav">
  <div class="container cf">
    <div class="brand">
      <a href="#splash">Monitoring</a>
    </div>
    <i class="fa fa-bars nav-toggle"></i>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#about" class="smoothScroll" >Tentang Kami</a></li>
      <li class="active"><a href="#skills" class="smoothScroll" >Deskripsi</a></li>
      <li class="active"><a href="#portfolio" class="smoothScroll" >Portfolio</a></li>
      <li class="active"><a href="#contact" class="smoothScroll" >Kontak</a></li>
      @guest
      <li class="active"><a href="/login" class="smoothScroll" >Login</a></li>
      @else
      <li class="active"><a href="/logout" class="smoothScroll" >Logout</a></li>
      @endguest
    </ul>
  </div>
</nav>

<div class="container-fluid splash" id="splash">
  <div class="container">
    <img src=" {{asset('img/sucof.jpg')}} " alt="Portrait of Mr. Roboto" class="profile-image">
    <h1 style="font-size : 75px;">Monitoring Divisi Umum</h1>
    <span class="lead">Sucofindo. PT (Persero)</span>
    <span class="continue"><a href="#about"><i class="fa fa-angle-down"></i></a></span>
  </div>
</div>

<div class="container-fluid intro" id="about">
  <div class="container">
    <h2>Tentang</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias ratione impedit soluta amet quas saepe temporibus <a href="#">eum reprehenderit</a> voluptas! A nihil adipisci itaque quos quo dolorum consequuntur iusto facere quaerat, excepturi quod, necessitatibus aliquid quae est qui, aut in assumenda animi tempora debitis. Beatae, veritatis, delectus. Repellat dolore, molestias nam.</p>
  </div>
</div>

<div class="container-fluid features" id="skills">
  <div class="container cf">
    <h2>Skills &amp; Experience</h2>
    <div class="col-3">
      <img src="https://s22.postimg.org/oi5es3fkx/icon_cloud.png" alt="">
      <h3>Cloud Computing</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda modi maiores eum commodi soluta, blanditiis voluptates ea eos, cim! Neque.</p>
    </div>
    <div class="col-3">
      <img src="https://s22.postimg.org/jxj8d5vvl/icon_coding.png" alt="">
      <h3>Expert Coding</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda modi maiores eum commodi soluta, blanditiis voluptates ea eos, cim! Neque.</p>
    </div>
    <div class="col-3">
      <img src="https://s22.postimg.org/citwksa01/icon_graph.png" alt="">
      <h3>Data Analysis</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda modi maiores eum commodi soluta, blanditiis voluptates ea eos, cim! Neque.</p>
    </div>
  </div>
</div>

<div class="container-fluid portfolio" id="portfolio">
  <div class="container cf">
    <h2>Portfolio</h2>
    <div class="gallery">
      <div class="gallery-image"><img src="https://unsplash.it/800/450?image=250" alt=""></div>
      <div class="gallery-image"><img src="https://unsplash.it/800/450?image=249" alt=""></div>
      <div class="gallery-image"><img src="https://unsplash.it/800/450?image=248" alt=""></div>
      <div class="gallery-image"><img src="https://unsplash.it/800/450?image=247" alt=""></div>
      <div class="gallery-image"><img src="https://unsplash.it/800/450?image=239" alt=""></div>
      <div class="gallery-image"><img src="https://unsplash.it/800/450?image=238" alt=""></div>
    </div>
  </div>
</div>

<div class="container-fluid contact" id="contact">
  <div class="container">
    <form method="POST" action=" {{route('contactme')}} " >
       {!! csrf_field() !!}
      <h2>Kontak Kami</h2>
      <input type="text" placeholder="Name" id="name" name="name" class="full-half">
      <input type="email" placeholder="Email" id="email" name="email" class="full-half">
      <input type="text" placeholder="Subject" id="subject" name="subject">
      <textarea placeholder="Message" id="message" name="message"></textarea>
      <input type="submit" value="Send">
    </form>
  </div>
</div>

<footer class="container-fluid footer">
  <div class="container">
    <a href="#" target="_blank"><i class="fa fa-facebook">Divsum</i></a>
    <a href="#" target="_blank"><i class="fa fa-twitter">Sucofindo</i></a><br>
    <a href="#" target="_blank"><i class="fa fa-github">..</i></a>
    <a href="#" target="_blank"><i class="fa fa-dribbble"></i></a>
    <a href="#" target="_blank"><i class="fa fa-codepen"></i></a>
  </div>
</footer>
<script type="text/javascript" src=" {{asset('js/app-landing.js')}} ">
    ////////////////////////////////////
// NAVIGATION SHOW/HIDE

$("nav ul").hide();

$(".nav-toggle").click( function() {
  $("nav ul").slideToggle("medium");
});

$("nav ul li a, .brand a").click( function() {
  $("nav ul").hide();
});

////////////////////////////////////
// SMOOTH SCROLLING WITH NAV HEIGHT OFFSET

$(function() {
  var navHeight = $("nav").outerHeight();
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top - navHeight
        }, 1000);
        return false;
      }
    }
  });
});

////////////////////////////////////
// NAVIGATION STICKY

var viewHeight = $(window).height();
var navigation = $('nav');

$(window).scroll( function() {
  if ( $(window).scrollTop() > (viewHeight - 175) ) { //edit for nav height
    navigation.addClass('sticky');
  } else {
    navigation.removeClass('sticky');
  }
});

////////////////////////////////////////////////
// MAKE THE SPLASH CONTAINER VERTICALLY CENTERED

function centerSplash() {
  var navHeight = $("nav").outerHeight();
  var splashHeight = $(".splash .container").height();
  var remainingHeight = $(window).height() - splashHeight - navHeight;
  $(".splash .container").css({"padding-top" : remainingHeight/2, "padding-bottom" : remainingHeight/2});
}

$( document ).ready( function() {
  centerSplash();
});

$( window ).resize( function() {
  centerSplash();
});
</script>
</body>
</html>