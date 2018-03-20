@if(!Auth::check())
<nav class="navbar navbar-expand-sm navbar-light bg-muted sticky-top">
  <a href="#" class='navbar-brand'> <img  width='40px' height='40px' src="{{ asset('ufc.png') }}" alt=""> </a>
  <form class="form-inline mr-0 ml-5" action="{{ route('login')}}" method="post">
    {{ csrf_field() }}
    <input class="form-control mr-2" type="text" name="usuario" value="" placeholder="Digite seu usuário">
    <input class="form-control mr-3" type="password" name="senha" value="" placeholder="Digite sua senha">
    <button type="submit" class="btn btn-primary" name="button">Enviar</button>
  </form>
</nav>
@else
<nav class="navbar navbar-expand-sm navbar-light bg-muted fixed-top">
  <a href="#" class='navbar-brand'> <img  width='40px' height='40px' src="{{ asset('ufc.png') }}" alt=""> </a>
  <div class="navbar-nav">
    <a href="{{ route('logout') }}" class="nav-item nav-link">Logout</a>
  </div>
</nav>
@endif
