@extends('master')

@section('titulo')
PRAE - Adicionar bolsa
@endsection

@section('conteudo')
@include('nav')

<div class="row justify-content-center">
  <div class="mt-5 pt-5 col-sm-10">

    @if(session('mensagem') != NULL )
    <div class="mt-5 alert alert-success alert-dismissable">
      {{ session('mensagem') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

      <div class="card">
        <div class="card-header">
            <h2>Cadastrar bolsa</h2>
        </div>
        <div class="card-body">
            <form class="form" action="{{ route('sistema.confirmarCadastroBolsa') }}" method="post">
              {{ csrf_field() }}
              <input class="form-control mb-3" type="text" name="nome" value="" placeholder="Nome">
              <input class="form-control mb-3" type="text" name="responsavel" value="" placeholder="Responsável">
              <input class="form-control mb-3" type="text" name="email" value="" placeholder="Email">
              <input class="form-control mb-3" type=text name="fone" value="" placeholder="Fone">
              <input class="form-control mb-3" type="text" name="bairro" value="" placeholder="Bairro">
              <input class="form-control mb-3" type="text" name="rua" value="" placeholder="Rua">
              <input class="form-control mb-3" type="text" name="numero" value="" placeholder="Número">
              <textarea class="form-control mb-3" name="descricao" rows="8" cols="80" placeholder="Descrição da bolsa"></textarea>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-success mr-2" name="button" title="confirmar cadastro">Cadastrar</button><a href="{{ route('sistema.bolsas') }}" class="btn btn-danger" name="button" title="cancelar cadastro">Cancelar</a>
          </form>
        </div>
      </div>
  </div>
</div>
@endsection
