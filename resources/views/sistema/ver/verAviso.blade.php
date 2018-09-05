@extends('master')

@section('titulo')
@endsection

@section('conteudo')
@include('nav')
@if( $errors->any() )

  @foreach( $errors->all() as $error )

    <div class="alert alert-warning mt-5 pt-5">
      {{ $error }}
    </div>

  @endforeach

@else
@endif
<div class="row justify-content-center">
  <div class="mt-5 pt-5 col-sm-10 pb-5">
    <div class="card mb-5">
        @if($errors->any())
          @foreach($errors->all() as $error)
            <div class="alert alert-warning">
              {{ $error }}
            </div>
          @endforeach
        @endif
        <div class="card-header">
          <h2>{{ $aviso->titulo }}</h2>
        </div>
        <div class="card-body">
            <form class="form" action="{{ route('sistema.salvarAviso',['id' => $aviso->id]) }}" method="post">
                {{ csrf_field() }}
                Titulo
                <div class="input-group mb-3">

                    <input id="campo-1" class="form-control" type="text" name="titulo" value="{{ $aviso->titulo }}" readonly>
                    <div class="input-group-append">
                      <button id="1" class="btn btn-primary destravar trava" type="button" name="button" title="desbloquear"><span class="fas fa-unlock" style="pointer-events: none"></span</button>
                    </div>
                </div>

                Mensagem
                <div class="input-group mb-3">

                  <textarea id="campo-2" class="form-control" rows="10" name="mensagem" readonly>{{ $aviso->mensagem }}</textarea>
                  <div class="input-group-append">
                    <button id="2" type="button" name="button" class="btn btn-primary destravar trava" title="desbloquear" ><span class="fas fa-unlock" style="pointer-events: none"></span></button>
                  </div>

                </div>

                Título do link
                <div class="input-group mb-3">

                    <input id="campo-3" class="form-control" type="text" name="titulo_link" value="{{ $aviso->titulo_link }}" readonly>
                    <div class="input-group-append">
                      <button id="3" class="btn btn-primary destravar trava" type="button" name="button" title="desbloquear"><span class="fas fa-unlock" style="pointer-events: none"></span</button>
                    </div>
                </div>

                Link
                <div class="input-group mb-3">

                    <input id="campo-4" class="form-control" type="text" name="link" value="{{ $aviso->link }}" readonly>
                    <div class="input-group-append">
                      <button id="4" class="btn btn-primary destravar trava" type="button" name="button" title="desbloquear"><span class="fas fa-unlock" style="pointer-events: none"></span</button>
                    </div>
                </div>

        </div>
        <div class="card-footer">
            <button class="btn btn-success mr-2" type="button" data-toggle="modal" data-target="#confirmarMudancas" name="button" title="salvar mudanças">Salvar mudanças</button><a href="{{ route('sistema.avisos') }}" class="btn btn-primary mr-2" title="cancelar mudanças e voltar">Cancelar</a><button class="btn btn-danger" type="button" data-toggle="modal" data-target="#confirmarDelecao" name="button" title="apagar aviso">Apagar aviso</button>
            <div id="confirmarMudancas" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                      <h3>Confirmar alterações</h3>
                  </div>
                  <div class="modal-body">
                      Deseja salvar as alterações?
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-success mr-2" type="submit" name="button" title="confirmar mudanças">Confirmar</button><button class="btn btn-danger" type="button" data-dismiss="modal" name="button" title="cancelar mudanças">Cancelar</button>
                  </div>
                </div>
              </div>
            </div>

            </form>

            <div id="confirmarDelecao" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                      <h3>Confirmar alterações</h3>
                  </div>
                  <div class="modal-body">
                      Deseja salvar as alterações?
                  </div>
                  <div class="modal-footer">
                      <form action="{{ route('sistema.deletarAviso',['id' => $aviso->id]) }}" method="POST">{{ csrf_field() }}<button class="btn btn-success mr-2" type="submit" name="button" title="confirmar mudanças">Confirmar</button></form><button class="btn btn-danger" type="button" data-dismiss="modal" name="button" title="cancelar mudanças">Cancelar</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>

</div>
@endsection
