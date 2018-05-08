@extends('master')

@section('titulo')

PRAE - compromisso

@endsection

@section('conteudo')
@include('nav')
<div class="row justify-content-center">
  <div class="mt-5 pt-5 col-sm-10">
    <div class="card">
      <div class="card-header">
        <h2>{{ $compromisso->titulo }}</h2>
      </div>
      <div class="card-body">
        <form class="form" action="{{ route('usuario.salvarCompromisso',['id' => $compromisso->id]) }}" method="post">
            {{ csrf_field() }}
            <div class="input-group mb-3">
              <input id="campo-1" class="form-control" type="text" name="titulo" value="{{ $compromisso->titulo }}" readonly>
              <div class="input-group-append">
                <button id="1" class="btn btn-primary destravar trava" type="button" name="button"><span class="fas fa-lock"></span></button>
              </div>
            </div>
            <div class="input-group">
              <input id="campo-2" class="form-control" type="datetime-local" name="data" value="{{ $compromisso->data }}" readonly>
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
      </form><a href="{{ route('usuario.verCoordenadoria',['id' => $compromisso->categoria_id ]) }}" class="btn btn-primary mr-2" >Cancelar</a><button class="btn btn-danger" type="button" data-toggle="modal" data-target="#confirmarDelecaoCompromisso" name="button">Apagar compromisso</button>
        <div class="modal fade" id="confirmarDelecaoCompromisso">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h3>Confirmar deleção do compromisso</h3>
              </div>
              <div class="modal-body">
                  Deseja deletar o compromisso?
              </div>
              <div class="modal-footer">
                <form class="form" action="{{ route('usuario.deletarCompromisso',['id' => $compromisso->id]) }}" method="post">
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
