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
            <form class="" action="index.html" method="post">
                <input class="form-control mb-3" type="text" name="nome" value="{{ $usuario->nome }}" readonly>
                <input class="form-control mb-3" type="text" name="email" value="{{ $usuario->email }}" readonly>
                <input class="form-control mb-3" type="text" name="usuario" value="{{ $usuario->usuario }}" readonly>
                <input class="form-control mb-3" type="password" name="senha" value="{{ $usuario->senha }}" readonly>
                <input class="form-control mb-3" type="password" name="senha_confirmation" value="{{ $usuario->senha }}" readonly>

        </div>
        <div class="card-footer">
              <button class="btn btn-success mr-2" type="button" name="button">Salvar mudanças</button><button class="btn btn-primary mr-2" type="button" name="button">Cancelar</button><button class="btn btn-danger" type="button" name="button">Apagar usuario</button>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection
