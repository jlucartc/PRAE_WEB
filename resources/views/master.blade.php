<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/all.css') }}">
    <title>@yield('titulo')</title>
  </head>
  <body>
    @yield('conteudo')
  </body>
  <script type="text/javascript" src="{{ secure_asset('js/app.js') }}"></script>
  <script type="text/javascript" src="{{ secure_asset('js/all.js') }}"></script>
</html>
