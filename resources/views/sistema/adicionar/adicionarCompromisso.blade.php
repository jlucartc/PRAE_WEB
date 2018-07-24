@extends('master')

@section('titulo')
PRAE - Adicionar compromisso
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
      @if($errors->any())
        @foreach($errors->all() as $error)
          <div class="alert alert-warning">
              {{ $error }}
          </div>
        @endforeach
      @endif

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
            <h2>Cadastrar compromisso</h2>
        </div>
        <div class="card-body">
            <form class="form" action="{{ route('sistema.confirmarCadastroCompromisso') }}" method="post">
              {{ csrf_field() }}
              <input class="form-control mb-3" type="text" name="titulo" value="" placeholder="Título">
              <input class="form-control mb-3" type="datetime-local" name="data" value="" placeholder="Data">
              <input class="form-control mb-3" type="text" name="local" value="" placeholder="Local">

        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-success mr-2" name="button" title="confirmar cadastro">Cadastrar</button><a href="{{ route('sistema.compromissos') }}" class="btn btn-danger"name="button" title="cancelar cadastro">Cancelar</a>
          </form>
        </div>
      </div>
  </div>
</div>
@endsection
