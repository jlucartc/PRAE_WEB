@extends('master')

@section('titulo')

PRAE - divisao

@endsection

@section('conteudo')
@include('nav')
<div class="row justify-content-center">
  <div class="mt-5 pt-5 col-sm-10">
    <div class="card">
      <div class="card-header">
        <h2>{{ $divisao->nome }}</h2>
      </div>
      <div class="card-body">
        <form class="form" action="{{ route('usuario.salvarDivisao',['id' => $divisao->id]) }}" method="post">
            {{ csrf_field() }}
            Nome
            <div class="input-group mb-3">
              <input id="campo-1" class="form-control" type="text" name="nome" value="{{ $divisao->nome }}" readonly>
              <div class="input-group-append">
                <button id="1" class="btn btn-primary destravar trava" type="button" name="button"><span class="fas fa-lock"></span></button>
              </div>
            </div>
            Email
            <div class="input-group mb-3">
              <input id="campo-2" class="form-control" type="text" name="email" value="{{ $divisao->email }}" readonly>
              <div class="input-group-append">
                  <button id="2" type="button" class="btn btn-primary destravar trava" name="button"> <span class="fas fa-lock"></span> </button>
              </div>
            </div>
            Fone
            <div class="input-group mb-3">
              <input id="campo-3" class="form-control" type="text" name="fone" value="{{ $divisao->fone }}" readonly>
              <div class="input-group-append">
                  <button id="3" type="button" class="btn btn-primary destravar trava" name="button"> <span class="fas fa-lock"></span> </button>
              </div>
            </div>
            Fax
            <div class="input-group mb-3">
              <input id="campo-4" class="form-control" type="text" name="fax" value="{{ $divisao->fax }}" readonly>
              <div class="input-group-append">
                  <button id="4" type="button" class="btn btn-primary destravar trava" name="button"> <span class="fas fa-lock"></span> </button>
              </div>
            </div>
            <input type="hidden" name="id" value="{{ $divisao->id }}">
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
      </form><a href="{{ route('usuario.verCoordenadoria',['id' => $divisao->coordenadoria_id ]) }}" class="btn btn-primary mr-2" >Cancelar</a><button class="btn btn-danger" type="button" data-toggle="modal" data-target="#confirmarDelecaoDivisao" name="button">Apagar divisão</button>
        <div class="modal fade" id="confirmarDelecaoDivisao">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h3>Confirmar deleção da divisão</h3>
              </div>
              <div class="modal-body">
                  Deseja deletar a divisão?
              </div>
              <div class="modal-footer">
                <form class="form" action="{{ route('usuario.deletarDivisao',['id' => $divisao->id]) }}" method="post">
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
