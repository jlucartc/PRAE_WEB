@extends('master')

@section('titulo')

PRAE - Ver paragrafo

@endsection

@section('conteudo')
@include('nav')
<div class="row justify-content-center">
  <div class="mt-5 pt-5 col-sm-10 pb-5">
    <div class="card mb-5">
      <div class="card-header">
        <h2>{{ $paragrafo->titulo }}</h2>
      </div>
      <div class="card-body">
        <form class="form" action="{{ route('sistema.salvarParagrafo',['id' => $paragrafo->id]) }}" method="post">
            {{ csrf_field() }}
            Título
            <div class="input-group mb-3">
              <input id="campo-1" class="form-control" type="text" name="titulo" value="{{ $paragrafo->titulo }}" readonly>
              <div class="input-group-append">
                <button id="1" class="btn btn-primary destravar trava" type="button" name="button"><span class="fas fa-lock"></span></button>
              </div>
            </div>
            Texto
            <div class="input-group mb-3">
              <textarea id="campo-2" class="form-control" name="texto" rows=10 readonly>{{ $paragrafo->texto }}</textarea>
              <div class="input-group-append">
                <button id="2" class="btn btn-primary destravar trava" type="button" name="button"><span class="fas fa-lock"></span></button>
              </div>
            </div>
      </div>
      <div class="card-footer">
        <button class="btn btn-success mr-2" type="button" data-toggle="modal" data-target="#confirmarDados" name="button">Salvar mudanças</button>
        <div class="modal fade" id="confirmarDados">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h3>Salvar dados</h3>
              </div>
              <div class="modal-body">
                  Deseja salvar os dados?
              </div>
              <div class="modal-footer">
                  <button class="btn btn-success mr-2" type="submit" name="button">Confirmar</button><button class="btn btn-danger" data-dismiss="modal" type="button" name="button">Cancelar</button>
              </div>
            </div>
          </div>
        </div>
      </form><a href="{{ route('sistema.verSecao',['id' => $paragrafo->secao_id ]) }}" class="btn btn-primary mr-2" >Cancelar</a><button class="btn btn-danger" type="button" data-toggle="modal" data-target="#confirmarDelecaoItem" name="button">Apagar paragrafo</button>
        <div class="modal fade" id="confirmarDelecaoItem">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h3>Confirmar deleção paragrafo</h3>
              </div>
              <div class="modal-body">
                  Deseja deletar o paragrafo?
              </div>
              <div class="modal-footer">
                <form class="form" action="{{ route('sistema.deletarParagrafo',['id' => $paragrafo->id]) }}" method="post">
                  {{ csrf_field() }}
                  <button class="btn btn-success mr-2" type="submit" name="button">Confirmar</button><button class="btn btn-danger" data-dismiss="modal" type="button" name="button">Cancelar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <h3 class="mt-5 mb-3">Listas do parágrafo<a href="{{ route('sistema.adicionarLista',['id' => $paragrafo->id]) }}" class="btn btn-secondary mr-2 float-right" >Adicionar lista  <span class="fas fa-plus"></span> </a></h3>
    @if( !$listas->isEmpty() )
      <div class="list-group">
        @foreach( $listas as $lista )
          <a href="{{ route('sistema.verLista',['id' => $lista->id]) }}" class="list-group-item list-group-item-action border border-dark">{{ ucfirst($lista->nome) }}</a>
        @endforeach
      </div>
    @else
      <div class="alert alert-info">
        Não há listas cadastradas
      </div>
    @endif
  </div>
</div>
@endsection
