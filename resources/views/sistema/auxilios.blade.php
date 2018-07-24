@extends('master')

@section('titulo')
PRAE - Auxilios
@endsection

@section('conteudo')
@include('nav')
<div class="row justify-content-center">
  <div class="col-sm-10">
    <h1 class="mt-5 pt-5 mb-3">Auxilios <a href="{{ route('sistema.adicionarAuxilio') }}" class="btn btn-secondary float-right" name="button" title="adicionar auxílio">Adicionar auxílio<i class="fas fa-plus ml-2"></i></a> </h1>
    @if(!$auxilios->isEmpty())
      <div class="list-group">
        @foreach($auxilios as $auxilio)
          <a href="{{ route('sistema.verAuxilio',['id' => $auxilio->id]) }}" class="list-group-item list-group-item-action border border-dark">{{ ucfirst($auxilio->nome) }}</a>
        @endforeach
      </div>
    @else
      <div class="alert alert-info">
        Não há auxilios cadastrados
      </div>
    @endif
  </div>
</div>

@endsection
