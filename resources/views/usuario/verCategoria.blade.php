@extends('master')

@section('titulo')
PRAE - Categoria
@endsection

@section('conteudo')
@include('nav')
<div class="row justify-content-center">
  <div class="mt-5 pt-5 col-sm-10 pb-5">
    <div class="card mb-5">
        <div class="card-header">
          <h2>{{ $categoria->nome }}</h2>
        </div>
        <div class="card-body">
            <form class="form" action="#" method="post">

                Nome
                <div class="input-group mb-3">

                    <input class="form-control" type="text" name="" value="{{ $categoria->nome }}" readonly>
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button" name="button"><span class="fas fa-lock"></span></button>
                    </div>
                </div>

                Responsável
                <div class="input-group mb-3">

                    <input class="form-control" type="text" name="" value="{{ $categoria->responsavel }}" readonly>
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button" name="button"><span class="fas fa-lock"></span></button>
                    </div>
                </div>

                Email
                <div class="input-group mb-3">

                  <input class="form-control" type="text" name="" value="{{ $categoria->email }}" readonly>
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button" name="button"><span class="fas fa-lock"></span></button>
                  </div>

                </div>

                Fone
                <div class="input-group mb-3">

                  <input class="form-control" type="text" name="" value="{{ $categoria->fone }}" readonly>
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button" name="button"><span class="fas fa-lock"></span></button>
                  </div>

                </div>

                Rua
                <div class="input-group mb-3">

                  <input class="form-control" type="text" name="" value="{{ $categoria->rua }}" readonly>
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button" name="button"><span class="fas fa-lock"></span></button>
                  </div>

                </div>

                Número
                <div class="input-group mb-3">

                  <input class="form-control" type="text" name="" value="{{ $categoria->numero }}" readonly>
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button" name="button"><span class="fas fa-lock"></span></button>
                  </div>

                </div>

                Bairro
                <div class="input-group mb-3">

                  <input class="form-control" type="text" name="" value="{{ $categoria->bairro }}" readonly>
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button" name="button"><span class="fas fa-lock"></span></button>
                  </div>

                </div>

        </div>
        <div class="card-footer">
            <button class="btn btn-success mr-2" type="button" name="button">Salvar mudanças</button><a href="{{ route('usuario.adicionarDescricao',['id' => $categoria->id]) }}" class="btn btn-primary mr-2" >Adicionar descrição</a><button class="btn btn-danger" type="button" name="button">Apagar categoria</button>
            </form>
        </div>
    </div>
    <h2 class="mt-3 mb-3">Lista de descrições</h2>
    @if( !$descricoes->isEmpty() )
      <div class="list-group">
        @foreach( $descricoes as $descricao )
          <a href="{{ route('usuario.verDescricao',['id' => $descricao->id]) }}" class="list-group-item list-group-item-action border border-dark">{{ ucfirst($descricao->titulo) }}</a>
        @endforeach
      </div>
    @else
      <div class="alert alert-info">
        Não há descrições nesta categoria
      </div>
    @endif
  </div>

</div>
@endsection
