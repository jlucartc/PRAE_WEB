@extends('master')

@section('titulo')
PRAE - Adicionar categoria
@endsection

@section('conteudo')
@include('nav')
<div class="row justify-content-center">
  <div class="mt-5 pt-5 col-sm-10">
      <div class="card">
        <div class="card-header">
            <h2>Cadastrar categoria</h2>
        </div>
        <div class="card-body">
            <form class="form" action="index.html" method="post">
              {{ csrf_field() }}
              <input class="form-control mb-3" type="text" name="nome" value="" placeholder="Nome">
              <input class="form-control mb-3" type="text" name="responsavel" value="" placeholder="Responsável">
              <input class="form-control mb-3" type="text" name="email" value="" placeholder="Email">
              <input class="form-control mb-3" type="password" name="fone" value="" placeholder="Fone">
              <input class="form-control mb-3" type="password" name="bairro" value="" placeholder="Bairro">
              <input class="form-control mb-3" type="password" name="rua" value="" placeholder="Rua">
              <input class="form-control mb-3" type="password" name="numero" value="" placeholder="Número">

        </div>
        <div class="card-footer">
          <button type="button" class="btn btn-success mr-2" name="button">Cadastrar</button><button type="button" class="btn btn-danger"name="button">Cancelar</button>
          </form>
        </div>
      </div>
  </div>
</div>
@endsection
