<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('titulo')</title>
  </head>
  <body style="background-image: {{ asset('assistencia-estudantil.png') }}">
    @yield('conteudo')
  </body>
  <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</html>
