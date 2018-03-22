@extends('master')

@section('titulo')
PRAE - Usuários
@endsection

@section('conteudo')
@include('nav')
<div class="row justify-content-center">
  <div class="col-sm-10">
    <h1 class="mt-5 pt-5 mb-3">Usuários <a href="{{ route('usuario.adicionarUsuario') }}" class="btn btn-secondary" name="button">Adicionar usuário<i class="fas fa-plus ml-2"></i></a> </h1>
    @if(!$usuarios->isEmpty())
      <div class="list-group">
        @foreach($usuarios as $usuario)
          <a href="{{ route('usuario.verUsuario',['id' => $usuario->id]) }}" class="list-group-item list-group-item-action border border-dark">{{ ucfirst($usuario->nome) }}</a>
        @endforeach
      </div>
    @else
      <div class="alert alert-info">
        Não há usuários cadastrados
      </div>
    @endif
  </div>
</div>

@endsection
