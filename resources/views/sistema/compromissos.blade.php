@extends('master')

@section('titulo')
PRAE - Compromissos
@endsection

@section('conteudo')
@include('nav')
<div class="row justify-content-center">
  <div class="col-sm-10">
    <h1 class="mt-5 pt-5 mb-3">Atividades <a href="{{ route('sistema.adicionarCompromisso') }}" class="btn btn-secondary float-right" name="button" title="adicionar compromisso">Adicionar atividades<i class="fas fa-plus ml-2"></i></a> </h1>
    @if(!$compromissos->isEmpty())
      <div class="list-group">
        @foreach($compromissos as $compromisso)
          <a href="{{ route('sistema.verCompromisso',['id' => $compromisso->id]) }}" class="list-group-item list-group-item-action border border-dark">{{ ucfirst($compromisso->titulo) }}</a>
        @endforeach
      </div>
    @else
      <div class="alert alert-info">
        Não há atividades cadastradas
      </div>
    @endif
  </div>
</div>

@endsection
