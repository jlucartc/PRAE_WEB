@extends('master')

@section('titulo')
PRAE - Coordenadoria
@endsection

@section('conteudo')
@include('nav')
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
          <h2>{{ $coordenadoria->nome }}</h2>
        </div>
        <div class="card-body">
            <form class="form" action="{{ route('usuario.salvarCoordenadoria',['id' => $coordenadoria->id]) }}" method="post">
                {{ csrf_field() }}
                Nome
                <div class="input-group mb-3">

                    <input id="campo-1" class="form-control" type="text" name="nome" value="{{ $coordenadoria->nome }}" readonly>
                    <div class="input-group-append">
                      <button id="1" class="btn btn-primary destravar trava" type="button" name="button"><span class="fas fa-unlock" style="pointer-events: none"></span</button>
                    </div>
                </div>

                Coordenador(a)
                <div class="input-group mb-3">

                    <input id="campo-2" class="form-control" type="text" name="coordenador" value="{{ $coordenadoria->coordenador }}" readonly>
                    <div class="input-group-append">
                      <button id="2" class="btn btn-primary destravar trava" type="button" name="button"><span class="fas fa-unlock" style="pointer-events: none"></span></button>
                    </div>
                </div>

                Email
                <div class="input-group mb-3">

                  <input id="campo-3" class="form-control" type="text" name="email" value="{{ $coordenadoria->email }}" readonly>
                  <div class="input-group-append">
                    <button id="3" class="btn btn-primary destravar trava" type="button" name="button"><span class="fas fa-unlock" style="pointer-events: none"></span></button>
                  </div>

                </div>

                Fone
                <div class="input-group mb-3">

                  <input id="campo-4" class="form-control" type="text" name="fone" value="{{ $coordenadoria->fone }}" readonly>
                  <div class="input-group-append">
                    <button id="4" class="btn btn-primary destravar trava" type="button" name="button"><span class="fas fa-unlock" style="pointer-events: none"></span></button>
                  </div>

                </div>

                Fax
                <div class="input-group mb-3">

                  <input id="campo-5" class="form-control" type="text" name="fax" value="{{ $coordenadoria->fax }}" readonly>
                  <div class="input-group-append">
                    <button id="5" class="btn btn-primary destravar trava" type="button" name="button"><span class="fas fa-unlock" style="pointer-events: none"></span></button>
                  </div>

                </div>


        </div>
        <div class="card-footer">
            <button class="btn btn-success mr-2" type="button" data-toggle="modal" data-target="#confirmarMudancas" name="button">Salvar mudanças</button><a href="{{ route('usuario.coordenadorias') }}" class="btn btn-primary mr-2" >Cancelar</a><button class="btn btn-danger" data-toggle="modal" data-target="#confirmarDelecaoCoordenadoria" type="button" name="button">Apagar coordenadoria</button>
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
                      <button class="btn btn-success mr-2" type="submit" name="button">Confirmar</button><button class="btn btn-danger" type="button" data-dismiss="modal" name="button">Cancelar</button>
                  </div>
                </div>
              </div>
            </div>

            </form>

            <div id="confirmarDelecaoCoordenadoria" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                      <h3>Corfirmar deleção</h3>
                  </div>
                  <div class="modal-body">
                      Deseja deletar a coordenadoria?
                  </div>
                  <div class="modal-footer">
                      <form class="form" action="{{ route('usuario.deletarCoordenadoria',['id' => $coordenadoria->id]) }}" method="post"> {{ csrf_field() }} <button class="btn btn-success mr-2" type="submit" >Confirmar</button> </form><button class="btn btn-danger" type="button" data-dismiss="modal" name="button">Cancelar</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <h2 class="mt-5 mb-3">Lista de compromissos<a href="{{ route('usuario.adicionarCompromisso',['id' => $coordenadoria->id]) }}" class="btn btn-secondary mr-2 float-right" >Adicionar compromisso  <span class="fas fa-plus"></span> </a></h2>
    @if( !$compromissos->isEmpty() )
      <div class="list-group">
        @foreach( $compromissos as $compromisso )
          <a href="{{ route('usuario.verCompromisso',['id' => $compromisso->id]) }}" class="list-group-item list-group-item-action border border-dark">{{ ucfirst($compromisso->titulo) }} - {{ $compromisso->data }}</a>
        @endforeach
      </div>
    @else
      <div class="alert alert-info">
        Não há compromissos registrados nesta coordenadoria
      </div>
    @endif
    <h2 class="mt-5 mb-3 mt-3">Lista de divisões<a href="{{ route('usuario.adicionarDivisao',['id' => $coordenadoria->id]) }}" class="btn btn-secondary mr-2 float-right" >Adicionar divisão  <span class="fas fa-plus"></span> </a></h2>
    @if( !$divisoes->isEmpty() )
      <div class="list-group">
        @foreach( $divisoes as $divisao )
          <a href="{{ route('usuario.verDivisao',['id' => $divisao->id]) }}" class="list-group-item list-group-item-action border border-dark">{{ ucfirst($divisao->nome) }}</a>
        @endforeach
      </div>
    @else
      <div class="alert alert-info">
        Não há divisões cadastradas nesta coordenadoria
      </div>
    @endif
    <h2 class="mt-5 mb-3 mt-3">Lista de mapas<a href="{{ route('usuario.adicionarMapa',['id' => $coordenadoria->id]) }}" class="btn btn-secondary mr-2 float-right" >Adicionar mapa  <span class="fas fa-plus"></span> </a></h2>
    @if( !$mapas->isEmpty() )
      <div class="list-group">
        @foreach( $mapas as $mapa )
          <a class="list-group-item border border-dark">{{ ucfirst($mapa->nome) }}    <div class="d-inline float-right"> <form class="form-inline d-inline" action="{{ route('usuario.baixarMapa',['id' => $mapa->id]) }}" method="GET"><button type="submit" class="btn btn-success mr-2">Baixar mapa</button></form> <button class="btn btn-danger" type="button" name="button" data-toggle="modal" data-target="#confirmarDelecaoMapa{{ $mapa->id }}" >Apagar mapa</button> </div>      </a>
          <div class="modal fade" id="confirmarDelecaoMapa{{ $mapa->id }}">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                        <h3>Confirmar deleção de mapa</h3>
                      </div>
                      <div class="modal-body">
                          Deseja mesmo deletar o mapa?
                      </div>
                      <div class="modal-footer">
                        <form class="form" action="{{ route('usuario.deletarMapa',['id' => $mapa->id ]) }}" method="post">
                              {{ csrf_field() }}
                              <button type="submit" class="btn btn-success mr-2" name="button">Confirmar</button><button class="btn btn-danger" type="button" data-dismiss="modal" name="button">Cancelar</button>
                        </form>
                      </div>
                  </div>
              </div>
          </div>
        @endforeach
      </div>
    @else
      <div class="alert alert-info">
        Não há mapas cadastrados nesta categoria
      </div>
    @endif
  </div>

</div>
@endsection
