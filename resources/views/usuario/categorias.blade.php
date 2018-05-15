@extends('master')

@section('titulo')
PRAE - Categorias
@endsection

@section('conteudo')
@include('nav')
<div class="row justify-content-center">
  <div class="col-sm-10">
    <h1 class="mt-5 pt-5 mb-3">Categorias <a href="{{ route('usuario.adicionarCategoria') }}" class="btn btn-secondary float-right" >Adicionar categoria <span class="fas fa-plus"></span></a></h1>
    @if(!$categorias->isEmpty())
      <div class="list-group">
        @foreach($categorias as $categoria)
          <a href="{{ route('usuario.verCategoria',[ 'id' => $categoria->id]) }}" class="list-group-item list-group-item-action border border-dark">{{ ucfirst($categoria->nome) }}</a>
        @endforeach
      </div>
    @else
      <div class="alert alert-info">
        Não há categorias cadastradas
      </div>
    @endif
  </div>
</div>


@endsection
