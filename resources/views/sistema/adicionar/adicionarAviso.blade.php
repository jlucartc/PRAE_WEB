@extends('master')

@section('titulo')
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
            <h2>Cadastrar aviso</h2>
        </div>
        <div class="card-body">
            <form class="form" action="{{ route('sistema.confirmarCadastroAviso') }}" method="post">
              {{ csrf_field() }}
              <input class="form-control mb-3" type="text" name="titulo" value="" placeholder="Título">
              <textarea class="form-control mb-3" name="mensagem" rows="8" cols="80" placeholder="Mensagem"></textarea>
              <input class="form-control mb-3" type="text" name="titulo_link" value="" placeholder="Título do link">
              <input class="form-control mb-3" type="text" name="link" value="" placeholder="Link">
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-success mr-2" name="button" title="confirmar cadastro">Cadastrar</button><a href="{{ route('sistema.avisos') }}" class="btn btn-danger" name="button" title="cancelar cadastro">Cancelar</a>
          </form>
        </div>
      </div>
  </div>
</div>
@endsection
