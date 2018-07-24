@extends('master')

@section('titulo')
PRAE - Coordenadorias
@endsection


@section('conteudo')
@include('nav')
<div class="row justify-content-center">
  <div class="col-sm-10">
    <h1 class="mt-5 pt-5 mb-3">Coordenadorias <a href="{{ route('sistema.adicionarCoordenadoria') }}" class="btn btn-secondary float-right" >Adicionar coordenadoria <span class="fas fa-plus"></span></a></h1>
    @if(!$coordenadorias->isEmpty())
      <div class="list-group">
        @foreach($coordenadorias as $coordenadoria)
          <a href="{{ route('sistema.verCoordenadoria',[ 'id' => $coordenadoria->id]) }}" class="list-group-item list-group-item-action border border-dark">{{ ucfirst($coordenadoria->nome) }}</a>
        @endforeach
      </div>
    @else
      <div class="alert alert-info">
        Não há coordenadorias cadastradas
      </div>
    @endif
  </div>
</div>

@endsection
