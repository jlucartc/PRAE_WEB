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
        <h2>Adicionar descrição</h2>
      </div>
      <div class="card-body">
          <form class="form" action="{{ route('usuario.confirmarCadastroDescricao') }}" method="post">
              {{ csrf_field() }}
              <input class="form-control mb-3" type="text" name="titulo" value="" placeholder="Título">
              <textarea class="form-control" type="textarea" name="texto" value="" placeholder="Digite aqui o texto da descrição." rows='10'></textarea>
              <input class="form-control" type="hidden" name="id" value="{{ $id }}">
      </div>
      <div class="card-footer">
            <button class="btn btn-success mr-2" type="submit" name="button" title="salvar descrição" >Salvar descrição</button><a href="{{ route('usuario.verCoordenadoria',['id' => $id]) }}" class="btn btn-primary" name="button" title="cancelar mudanças e voltar">Cancelar</a>
          </form>
      </div>
    </div>
  </div>
</div>
@endsection
