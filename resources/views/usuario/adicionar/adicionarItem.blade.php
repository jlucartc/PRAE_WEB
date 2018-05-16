@extends('master')

@section('titulo')
@endsection

@section('conteudo')
@include('nav')
<div class="row justify-content-center">
  <div class="mt-5 pt-5 col-sm-10">
    <div class="card">
      <div class="card-header">
        <h2>Adicionar descrição</h2>
      </div>
      <div class="card-body">
          <form class="form" action="{{ route('usuario.confirmarCadastroItem') }}" method="post">
              {{ csrf_field() }}
              <input class="form-control mb-3" type="text" name="nome" value="" placeholder="Nome">
              <textarea class="form-control" type="textarea" name="descricao" value="" placeholder="Digite aqui a descrição." rows='10'></textarea>
              <input class="form-control" type="hidden" name="id" value="{{ $id }}">
      </div>
      <div class="card-footer">
            <button class="btn btn-success mr-2" type="submit" name="button" title="salvar descrição" >Salvar descrição</button><button class="btn btn-primary"type="button" name="button" title="cancelar mudanças e voltar">Cancelar</button>
          </form>
      </div>
    </div>
  </div>
</div>
@endsection
