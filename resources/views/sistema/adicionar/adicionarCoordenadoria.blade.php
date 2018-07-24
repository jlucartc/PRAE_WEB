@extends('master')

@section('titulo')
PRAE - Adicionar coordenadoria
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
            <h2>Cadastrar coordenadoria</h2>
        </div>
        <div class="card-body">
            <form class="form" action="{{ route('sistema.confirmarCadastroCoordenadoria') }}" method="post">
              {{ csrf_field() }}
              <input class="form-control mb-3" type="text" name="nome" value="" placeholder="Nome">
              <input class="form-control mb-3" type="text" name="coordenador" value="" placeholder="Coordenador(a)">
              <input class="form-control mb-3" type=text name="fone" value="" placeholder="Fone">
              <input class="form-control mb-3" type=text name="fax" value="" placeholder="Fax">
              <input class="form-control mb-3" type="text" name="email" value="" placeholder="Email">


        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-success mr-2" name="button" title="confirmar cadastro">Cadastrar</button><a href="{{ route('sistema.coordenadorias') }}" class="btn btn-danger"name="button" title="cancelar cadastro">Cancelar</a>
          </form>
        </div>
      </div>
  </div>
</div>
@endsection
