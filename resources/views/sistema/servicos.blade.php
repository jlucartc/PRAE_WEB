@extends('master')

@section('titulo')
PRAE - Serviços
@endsection

@section('conteudo')
@include('nav')
<div class="row justify-content-center">
  <div class="col-sm-10">
    <h1 class="mt-5 pt-5 mb-3">Serviços <a href="{{ route('sistema.adicionarServico') }}" class="btn btn-secondary float-right" name="button" title="adicionar serviço">Adicionar serviço<i class="fas fa-plus ml-2"></i></a> </h1>
    @if(!$servicos->isEmpty())
      <div class="list-group">
        @foreach($servicos as $servico)
          <a href="{{ route('sistema.verServico',['id' => $servico->id]) }}" class="list-group-item list-group-item-action border border-dark">{{ ucfirst($servico->nome) }}</a>
        @endforeach
      </div>
    @else
      <div class="alert alert-info">
        Não há serviços cadastrados
      </div>
    @endif
  </div>
</div>

@endsection
