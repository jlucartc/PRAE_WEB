@extends('master')

@section('titulo')
@endsection

@section('conteudo')
@include('nav')
<div class="row justify-content-center">
  <div class="mt-5 pt-5 col-sm-10">
    <div class="card">
      <div class="card-header">
        <h2>{{ $item->nome }}</h2>
      </div>
      <div class="card-body">
        <form class="form" action="{{ route('sistema.salvarItem',['id' => $item->id]) }}" method="post">
            {{ csrf_field() }}
            Nome
            <div class="input-group mb-3">
              <input id="campo-1" class="form-control" type="text" name="nome" value="{{ $item->nome }}" readonly>
              <div class="input-group-append">
                <button id="1" class="btn btn-primary destravar trava" type="button" name="button"><span class="fas fa-lock"></span></button>
              </div>
            </div>
            Descrição
            <div class="input-group mb-3">
              <textarea id="campo-2" class="form-control" name="descricao" rows="10" readonly>{{ $item->descricao }}</textarea>
              <div class="input-group-append">
                  <button id="2" type="button" class="btn btn-primary destravar trava" name="button"> <span class="fas fa-lock"></span> </button>
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
      </form><a href="{{ route('sistema.verCategoria',['id' => $item->categoria_id ]) }}" class="btn btn-primary mr-2" >Cancelar</a><button class="btn btn-danger" type="button" data-toggle="modal" data-target="#confirmarDelecaoItem" name="button">Apagar descrição</button>
        <div class="modal fade" id="confirmarDelecaoItem">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h3>Confirmar deleção descrição</h3>
              </div>
              <div class="modal-body">
                  Deseja deletar a descrição?
              </div>
              <div class="modal-footer">
                <form class="form" action="{{ route('sistema.deletarItem',['id' => $item->id]) }}" method="post">
                  {{ csrf_field() }}
                  <button class="btn btn-success mr-2" type="submit" name="button">Confirmar</button><button class="btn btn-danger" data-dismiss="modal" type="button" name="button">Cancelar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
