@extends('master')

@section('titulo')
PRAE - adicionar mapa
@endsection

@section('conteudo')
@include('nav')
<div class="row justify-content-center">
  <div class="mt-5 pt-5 col-sm-10">
      @if($errors->any())
        @foreach($errors->all() as $error)
          <div class="alert alert-warning">
              {{ $error }}
          </div>
        @endforeach
      @endif
      <div class="card">
        <div class="card-header">
            <h2>Cadastrar mapa</h2>
        </div>
        <div class="card-body">
            <form class="form" action="{{ route('usuario.confirmarCadastroMapa') }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <input class="form-control mb-3" type="text" name="nome" value="" placeholder="Nome">
              <input class="form-control mb-3" type="file" name="mapa" value="" placeholder="Mapa">
              <input type=hidden name="id" value="{{ $id }}">

        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-success mr-2" name="button" title="confirmar cadastro">Cadastrar</button><button type="button" class="btn btn-danger"name="button" title="cancelar cadastro">Cancelar</button>
          </form>
        </div>
      </div>
  </div>
</div>
@endsection
