<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href=" {{asset('css/materialize.min.css')}} " media="screen, projection">
    <link rel="stylesheet" type="text/css" href=" {{asset('css/bootstrap.min.css')}} ">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

@include('menu')

@yield('content')

    <script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
      <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
      <script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>

      @yield('footer')

</body>
</html>