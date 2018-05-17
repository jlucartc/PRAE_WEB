@extends('master')

@section('titulo')
@endsection

@section('conteudo')
@include('nav')

@if(isset($mensagem))
<div class="mt-5 pt-5 alert alert-success alert-dismissable">
  {{ $mensagem }}
</div>
@endif

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
        <h2>Adicionar Item</h2>
      </div>
      <div class="card-body">
          <form class="form" action="{{ route('usuario.confirmarCadastroItem') }}" method="post">
              {{ csrf_field() }}
              <input class="form-control mb-3" type="text" name="nome" value="" placeholder="Nome">
              <textarea class="form-control" type="textarea" name="descricao" value="" placeholder="Digite aqui a descrição do item." rows='10'></textarea>
              <input class="form-control" type="hidden" name="id" value="{{ $id }}">
      </div>
      <div class="card-footer">
            <button class="btn btn-success mr-2" type="submit" name="button" title="salvar descrição" >Salvar item</button><a href="{{ route('usuario.verCategoria',['id' => $id]) }}" class="btn btn-primary"type="button" name="button" title="cancelar mudanças e voltar">Cancelar</a>
          </form>
      </div>
    </div>
  </div>
</div>
@endsection
