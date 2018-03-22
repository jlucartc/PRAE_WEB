@extends('master')

@section('titulo')
PRAE - Adicionar usuário
@endsection

@section('conteudo')
@include('nav')
<div class="row justify-content-center">
  <div class="mt-5 pt-5 col-sm-10">
      <div class="card">
        <div class="card-header">
            <h2>Cadastrar usuário</h2>
        </div>
        <div class="card-body">
            <form class="form" action="{{ route('usuario.confirmarCadastroUsuario') }}" method="post">
              {{ csrf_field() }}
              <input class="form-control mb-3" type="text" name="nome" value="" placeholder="Nome">
              <input class="form-control mb-3" type="text" name="email" value="" placeholder="Email">
              <input class="form-control mb-3" type="text" name="usuario" value="" placeholder="Usuário">
              <input class="form-control mb-3" type="password" name="senha" value="" placeholder="Senha">
              <input class="form-control mb-3" type="password" name="senha_confirmation" value="" placeholder="Confirmar senha">
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-success mr-2" name="button">Cadastrar</button><button type="button" class="btn btn-danger"name="button">Cancelar</button>
          </form>
        </div>
      </div>
      @if( $errors->any() )
        @foreach($errors->all() as $error)
          <div class="alert alert-warning">
            {{ $error }}
          </div>
        @endforeach
      @endif
  </div>
</div>
@endsection
