<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/public/favicon.ico">
    <link rel="icon" href="/public/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="/public/favicon.ico">
    <meta name="google-site-verification" content="fcyM1aEvQrGI0Us29GKgIQPNCbxoWoTi_UdFufWs69Y" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta')

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <header>
      <div class="logo">
        <a href="{{URL::to('/')}}"><img src="/images/logo.png" /> </a>
      </div>
  </header>
  
  <div id="app">
      @yield('content')
  </div>

  <footer>
      <a href="" >be in touch</a>
      <span>2020 All right reserved</span>
      <a href="" >instagram</a>
  </footer>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>