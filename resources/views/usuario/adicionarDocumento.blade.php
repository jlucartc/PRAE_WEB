@extends('master')

@section('titulo')
@endsection

@section('conteudo')
@include('nav')
<div class="row justify-content-center">
  <div class="mt-5 pt-5 col-sm-10">
    <div class="card">
      <div class="card-header">
        <h2>Adicionar documento</h2>
      </div>
      <div class="card-body">
        <form class="form" action="{{ route('usuario.confirmarCadastroDocumento') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $id }}">
            <input class="form-control mb-3" type="text" name="nome" value="" placeholder="Nome do documento">
            <input class="form-control" type="file" name="arquivo" value="">
      </div>
      <div class="card-footer">
            <button class="btn btn-success" type="submit" name="button" title="enviar documento">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
