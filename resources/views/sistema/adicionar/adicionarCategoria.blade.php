@extends('master')

@section('titulo')
PRAE - Adicionar categoria
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
            <h2>Cadastrar categoria</h2>
        </div>
        <div class="card-body">
            <form class="form" action="{{ route('sistema.confirmarCadastroCategoria') }}" method="post">
              {{ csrf_field() }}
              <input class="form-control mb-3" type="text" name="nome" value="" placeholder="Nome">
              <input class="form-control mb-3" type="text" name="responsavel" value="" placeholder="Responsável">
              <input class="form-control mb-3" type="text" name="email" value="" placeholder="Email">
              <input class="form-control mb-3" type=text name="fone" value="" placeholder="Fone">
              <input class="form-control mb-3" type="text" name="bairro" value="" placeholder="Bairro">
              <input class="form-control mb-3" type="text" name="rua" value="" placeholder="Rua">
              <input class="form-control mb-3" type="text" name="numero" value="" placeholder="Número">
              <select class="form-control mb-3" name="tipo">
                <option value="1">Bolsas</option>
                <option value="2">Auxílios</option>
                <option value="3">Programas</option>
                <option value="4">Institucionais</option>
              </select>
              <textarea class="form-control mb-3" name="descricao" rows="8" cols="80" placeholder="Descrição da categoria"></textarea>

        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-success mr-2" name="button" title="confirmar cadastro">Cadastrar</button><a href="{{ route('sistema.categorias') }}" class="btn btn-danger" name="button" title="cancelar cadastro">Cancelar</a>
          </form>
        </div>
      </div>
  </div>
</div>
@endsection
