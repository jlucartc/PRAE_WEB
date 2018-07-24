@extends('master')

@section('titulo')

PRAE - Ver seção

@endsection

@section('conteudo')
@include('nav')
<div class="row justify-content-center">
  <div class="mt-5 pt-5 col-sm-10">
    <div class="card mb-5">
      <div class="card-header">
        <h2>{{ $secao->nome }}</h2>
      </div>
      <div class="card-body">
        <form class="form" action="{{ route('sistema.salvarSecao',['id' => $secao->id]) }}" method="post">
            {{ csrf_field() }}
            Nome
            <div class="input-group mb-3">
              <input id="campo-1" class="form-control" type="text" name="nome" value="{{ $secao->nome }}" readonly>
              <div class="input-group-append">
                <button id="1" class="btn btn-primary destravar trava" type="button" name="button"><span class="fas fa-lock"></span></button>
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
      </form><a href="{{ route($rota,['id' => $secao->categoria_id ]) }}" class="btn btn-primary mr-2" >Cancelar</a><button class="btn btn-danger" type="button" data-toggle="modal" data-target="#confirmarDelecaoItem" name="button">Apagar seção</button>
        <div class="modal fade" id="confirmarDelecaoItem">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h3>Confirmar deleção seção</h3>
              </div>
              <div class="modal-body">
                  Deseja deletar a seção?
              </div>
              <div class="modal-footer">
                <form class="form" action="{{ route('sistema.deletarSecao',['id' => $secao->id]) }}" method="post">
                  {{ csrf_field() }}
                  <button class="btn btn-success mr-2" type="submit" name="button">Confirmar</button><button class="btn btn-danger" data-dismiss="modal" type="button" name="button">Cancelar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <h3 class="mt-5 mb-3">Lista de parágrafos<a href="{{ route('sistema.adicionarParagrafo',['id' => $secao->id]) }}" class="btn btn-secondary mr-2 float-right" >Adicionar parágrafo  <span class="fas fa-plus"></span> </a></h3>
    @if( !$paragrafos->isEmpty() )
      <div class="list-group">
        @foreach( $paragrafos as $paragrafo )
          <a href="{{ route('sistema.verParagrafo',['id' => $paragrafo->id]) }}" class="list-group-item list-group-item-action border border-dark">{{ ucfirst($paragrafo->titulo) }}</a>
        @endforeach
      </div>
    @else
      <div class="alert alert-info">
        Não há parágrafos cadastrados
      </div>
    @endif
  </div>
</div>
@endsection
