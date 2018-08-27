@extends('master')

@section('titulo')
PRAE - Avisos
@endsection

@section('conteudo')
@include('nav')
<div class="row justify-content-center">
  <div class="col-sm-10">
    <h1 class="mt-5 pt-5 mb-3">Avisos <a href="{{ route('sistema.adicionarAviso') }}" class="btn btn-secondary float-right" name="button" title="adicionar aviso">Adicionar aviso<i class="fas fa-plus ml-2"></i></a> </h1>
    @if(!$avisos->isEmpty())
      <div class="list-group">
        @foreach($avisos as $aviso)
          <a href="{{ route('sistema.verAviso',['id' => $aviso->id]) }}" class="list-group-item list-group-item-action border border-dark">{{ ucfirst($aviso->titulo) }}</a>
        @endforeach
      </div>
    @else
      <div class="alert alert-info">
        Não há avisos cadastrados
      </div>
    @endif
  </div>
</div>
@endsection
