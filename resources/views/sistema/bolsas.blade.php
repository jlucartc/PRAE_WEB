@extends('master')

@section('titulo')
PRAE - Bolsas
@endsection

@section('conteudo')
@include('nav')
<div class="row justify-content-center">
  <div class="col-sm-10">
    <h1 class="mt-5 pt-5 mb-3">Bolsas <a href="{{ route('sistema.adicionarBolsa') }}" class="btn btn-secondary float-right" name="button" title="adicionar bolsa">Adicionar bolsa<i class="fas fa-plus ml-2"></i></a> </h1>
    @if(!$bolsas->isEmpty())
      <div class="list-group">
        @foreach($bolsas as $bolsa)
          <a href="{{ route('sistema.verBolsa',['id' => $bolsa->id]) }}" class="list-group-item list-group-item-action border border-dark">{{ ucfirst($bolsa->nome) }}</a>
        @endforeach
      </div>
    @else
      <div class="alert alert-info">
        Não há bolsas cadastradas
      </div>
    @endif
  </div>
</div>

@endsection
