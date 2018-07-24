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
        <h2>Adicionar documento</h2>
      </div>
      <div class="card-body">
        <form class="form" action="{{ route('sistema.confirmarCadastroDocumento') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $id }}">
            <input class="form-control mb-3" type="text" name="nome" value="" placeholder="Nome do documento">
            <input class="form-control" type="file" name="arquivo" value="">
      </div>
      <div class="card-footer">
            <button class="btn btn-success" type="submit" name="button" title="enviar documento">Enviar</button>
            <a href="{{ route($rota,['id' => $id]) }}" class="btn btn-danger">Cancelar</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
