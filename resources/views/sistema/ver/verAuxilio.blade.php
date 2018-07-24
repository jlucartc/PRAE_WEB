@extends('master')

@section('titulo')
PRAE - Auxílio
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
          <h2>{{ $auxilio->nome }}</h2>
        </div>
        <div class="card-body">
            <form class="form" action="{{ route('sistema.salvarAuxilio',['id' => $auxilio->id]) }}" method="post">
                {{ csrf_field() }}
                Nome
                <div class="input-group mb-3">

                    <input id="campo-1" class="form-control" type="text" name="nome" value="{{ $auxilio->nome }}" readonly>
                    <div class="input-group-append">
                      <button id="1" class="btn btn-primary destravar trava" type="button" name="button" title="desbloquear"><span class="fas fa-unlock" style="pointer-events: none"></span</button>
                    </div>
                </div>

                Responsável
                <div class="input-group mb-3">

                    <input id="campo-2" class="form-control" type="text" name="responsavel" value="{{ $auxilio->responsavel }}" readonly>
                    <div class="input-group-append">
                      <button id="2" class="btn btn-primary destravar trava" type="button" name="button" title="desbloquear"><span class="fas fa-unlock" style="pointer-events: none"></span></button>
                    </div>
                </div>

                Email
                <div class="input-group mb-3">

                  <input id="campo-3" class="form-control" type="text" name="email" value="{{ $auxilio->email }}" readonly>
                  <div class="input-group-append">
                    <button id="3" class="btn btn-primary destravar trava" type="button" name="button" title="desbloquear"><span class="fas fa-unlock" style="pointer-events: none"></span></button>
                  </div>

                </div>

                Fone
                <div class="input-group mb-3">

                  <input id="campo-4" class="form-control" type="text" name="fone" value="{{ $auxilio->fone }}" readonly>
                  <div class="input-group-append">
                    <button id="4" class="btn btn-primary destravar trava" type="button" name="button" title="desbloquear"><span class="fas fa-unlock" style="pointer-events: none"></span></button>
                  </div>

                </div>

                Rua
                <div class="input-group mb-3">

                  <input id="campo-5" class="form-control" type="text" name="rua" value="{{ $auxilio->rua }}" readonly>
                  <div class="input-group-append">
                    <button id="5" class="btn btn-primary destravar trava" type="button" name="button" title="desbloquear"><span class="fas fa-unlock" style="pointer-events: none"></span></button>
                  </div>

                </div>

                Número
                <div class="input-group mb-3">

                  <input id="campo-6" class="form-control" type="text" name="numero" value="{{ $auxilio->numero }}" readonly>
                  <div class="input-group-append">
                    <button id="6" class="btn btn-primary destravar trava" type="button" name="button" title="desbloquear"><span class="fas fa-unlock" style="pointer-events: none"></span></button>
                  </div>

                </div>

                Bairro
                <div class="input-group mb-3">

                  <input id="campo-7" class="form-control" type="text" name="bairro" value="{{ $auxilio->bairro }}" readonly>
                  <div class="input-group-append">
                    <button id="7" class="btn btn-primary destravar trava" type="button" name="button" title="desbloquear"><span class="fas fa-unlock" style="pointer-events: none"></span></button>
                  </div>

                </div>

        </div>
        <div class="card-footer">
            <button class="btn btn-success mr-2" type="button" data-toggle="modal" data-target="#confirmarMudancas" name="button" title="salvar mudanças">Salvar mudanças</button><a href="{{ route('sistema.auxilios') }}" class="btn btn-primary mr-2" title="cancelar mudanças e voltar">Cancelar</a><button class="btn btn-danger" type="button" data-toggle="modal" data-target="#confirmarDelecao" name="button" title="apagar auxilio">Apagar auxilio</button>
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
                      <form action="{{ route('sistema.deletarAuxilio',['id' => $auxilio->id]) }}" method="POST">{{ csrf_field() }}<button class="btn btn-success mr-2" type="submit" name="button" title="confirmar mudanças">Confirmar</button></form><button class="btn btn-danger" type="button" data-dismiss="modal" name="button" title="cancelar mudanças">Cancelar</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <h3 class="mt-5 mb-3">Lista de seções<a href="{{ route('sistema.adicionarSecao',['id' => $auxilio->id]) }}" class="btn btn-secondary mr-2 float-right" >Adicionar seção  <span class="fas fa-plus"></span> </a></h3>
    @if( !$secoes->isEmpty() )
      <div class="list-group">
        @foreach( $secoes as $secao )
          <a href="{{ route('sistema.verSecao',['id' => $secao->id]) }}" class="list-group-item list-group-item-action border border-dark">{{ ucfirst($secao->nome) }}</a>
        @endforeach
      </div>
    @else
      <div class="alert alert-info">
        Não há seções cadastradas
      </div>
    @endif
    <h3 class="mt-5 mb-3">Lista de documentos<a href="{{ route('sistema.adicionarDocumento',['id' => $auxilio->id]) }}" class="btn btn-secondary mr-2 float-right" >Adicionar documento  <span class="fas fa-plus"></span> </a></h3>
    @if( !$documentos->isEmpty() )
      <div class="list-group">
        @foreach( $documentos as $documento )
      <a class="list-group-item border border-dark">{{ ucfirst($documento->nome) }}    <div class="d-inline float-right"> <form class="form-inline d-inline" action="{{ route('sistema.baixarDocumento',['id' => $documento->id]) }}" method="GET"><button class="btn btn-success mr-2" title="baixar arquivo" >Baixar arquivo</button></form> <button class="btn btn-danger" type="button" name="button" data-toggle="modal" data-target="#confirmarDelecaoDocumento{{ $documento->id }}" title="apagar arquivo">Apagar arquivo</button> </div>      </a>
          <div class="modal fade" id="confirmarDelecaoDocumento{{ $documento->id }}">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                        <h3>Confirmar deleção de documento</h3>
                      </div>
                      <div class="modal-body">
                          Deseja mesmo deletar o documento?
                      </div>
                      <div class="modal-footer">
                        <form class="form" action="{{ route('sistema.deletarDocumento',['id' => $documento->id ]) }}" method="post">
                              {{ csrf_field() }}
                              <button type="submit" class="btn btn-success mr-2" name="button" title="confirmar deleção de documento">Confirmar</button><button class="btn btn-danger" type="button" data-dismiss="modal" name="button" title="cancelar deleção">Cancelar</button>
                        </form>
                      </div>
                  </div>
              </div>
          </div>
        @endforeach
      </div>
    @else
      <div class="alert alert-info">
        Não há documentos cadastrados
      </div>
    @endif
  </div>

</div>
@endsection
