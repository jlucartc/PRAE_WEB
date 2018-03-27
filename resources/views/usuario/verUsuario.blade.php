@extends('master')

@section('titulo')
PRAE - Usuário
@endsection

@section('conteudo')
@include('nav')
<div class="row justify-content-center">
  <div class="mt-5 pt-5 col-sm-10">
    <div class="card">
        <div class="card-header">
          <h2>{{ $usuario->nome }}</h2>
        </div>
        <div class="card-body">
            <form class="form" action="{{ route('usuario.salvarUsuario',['id' => $usuario->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <input id="campo-1" class="form-control" type="text" name="nome" value="{{ $usuario->nome }}" readonly>
                    <div class="input-group-append">
                      <button id="1" class="btn btn-primary destravar trava" type="button" name="button"><span class="fas fa-unlock" style="pointer-events : none"></span></button>
                    </div>
                </div>

                <div class="input-group mb-3">
                  <input id="campo-2" class="form-control" type="text" name="email" value="{{ $usuario->email }}" readonly>
                  <div class="input-group-append">
                    <button id="2" class="btn btn-primary destravar trava" type="button" name="button"><span class="fas fa-unlock"  style="pointer-events : none"></span></button>
                  </div>
                </div>

                <div class="input-group mb-3">
                    <input id="campo-3" class="form-control" type="text" name="usuario" value="{{ $usuario->usuario }}" readonly>
                    <div class="input-group-append">
                      <button id="3" class="btn btn-primary destravar trava" type="button" name="button"><span class="fas fa-unlock"  style="pointer-events : none"></span></button>
                    </div>
                </div>

                <div class="input-group mb-3">
                  <input id="campo-4" class="form-control" type="password" name="senha" value="{{ $usuario->senha }}" readonly>
                  <div class="input-group-append">
                    <button id="4" class="btn btn-primary destravar trava" type="button" name="button"><span class="fas fa-unlock"  style="pointer-events : none"></span></button>
                  </div>
                </div>

                <div class="input-group mb-3">
                  <input id="campo-5" class="form-control" type="password" name="senha_confirmation" value="{{ $usuario->senha }}" readonly>
                  <div class="input-group-append">
                    <button id="5" class="btn btn-primary destravar trava" type="button" name="button"><span class="fas fa-unlock"  style="pointer-events : none"></span></button>
                  </div>
                </div>

        </div>
        <div class="card-footer">
              <button class="btn btn-success mr-2" type="button" data-toggle="modal" data-target="#confirmarMudancas" name="button">Salvar mudanças</button><a href="{{ route('usuario.usuarios') }}" class="btn btn-primary mr-2">Cancelar</a><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmarDelecaoUsuario">Apagar usuario</button>
              <div id="confirmarMudancas" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3>Confirmar as alterações</h3>
                    </div>
                    <div class="modal-body">
                      Deseja mesmo salvar as alterações?
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-success mr-2" type="submit" name="button">Confirmar</button><button class="btn btn-danger" data-dismiss="modal" type="button" name="button">Cancelar</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <form class="form" action="{{ route('usuario.deletarUsuario',['id' => $usuario->id]) }}" method="post">
              {{ csrf_field() }}
              <div class="modal fade" id="confirmarDelecaoUsuario">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                        <h3>Confirmar deleção de usuário</h3>
                    </div>
                    <div class="modal-body">
                        Deseja mesmo confirmar a deleção do usuário?
                    </div>
                    <div class="modal-footer">
                          <button class="btn btn-success mr-2" type="submit" name="button">Confirmar</button>
                          <button class="btn btn-danger" type="button" data-dismiss="modal" name="button">Cancelar</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
        </div>
    </div>

  </div>
</div>
@endsection
