@if(!Auth::check())
<nav class="navbar navbar-expand-sm navbar-light bg-white sticky-top">
  <img class="navbar-brand" width='40px' height='60px' src="{{ asset('ufc.png') }}" alt="logo ufc">
  <form class="form-inline mr-0 ml-5" action="{{ route('login') }}" method="post">
    {{ csrf_field() }}
    <input class="form-control mr-2" type="text" name="usuario" value="" placeholder="Digite seu usuário">
    <input class="form-control mr-3" type="password" name="senha" value="" placeholder="Digite sua senha">
    <button type="submit" class="btn btn-primary" name="button">Enviar</button>
  </form>
</nav>
@else
<nav class="navbar navbar-expand-sm navbar-light bg-white fixed-top">
  <img  class='navbar-brand' width='40px' height='60px' src="{{ asset('ufc.png') }}" alt="logo ufc">
  <div class="navbar-nav">
    <a href="{{ route('usuario.categorias') }}" class="nav-item nav-link">Categorias</a>
    <a href="{{ route('usuario.usuarios') }}" class="nav-item nav-link">Usuários</a>
    <a href="{{ route('usuario.coordenadorias') }}" class="nav-item nav-link">Coordenadorias</a>
    <a href="{{ route('logout') }}" class="nav-item nav-link ml-5">Logout</a>
  </div>
</nav>
@endif
