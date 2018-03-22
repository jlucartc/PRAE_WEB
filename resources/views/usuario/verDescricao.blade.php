@extends('master')

@section('titulo')
@endsection

@section('conteudo')
@include('nav')
<div class="row justify-content-center">
  <div class="mt-5 pt-5 col-sm-10">
    <div class="card">
      <div class="card-header">
        <h2>{{ $descricao->titulo }}</h2>
      </div>
      <div class="card-body">
        <form class="" action="index.html" method="post">
            <div class="input-group mb-3">
              <input class="form-control" type="text" name="titulo" value="{{ $descricao->titulo }}" readonly>
              <div class="input-group-append">
                <button class="btn btn-primary" type="button" name="button"><span class="fas fa-lock"></span></button>
              </div>
            </div>
            <div class="input-group">
              <textarea class="form-control" name="texto" rows="10" readonly>{{ $descricao->texto }}</textarea>
              <div class="input-group-append">
                  <button type="button" class="btn btn-primary" name="button"> <span class="fas fa-lock"></span> </button>
              </div>
            </div>
      </div>
      <div class="card-footer">
        <button class="btn btn-success mr-2" type="button" name="button">Salvar mudanças</button><button class="btn btn-primary mr-2" type="button" name="button">Cancelar</button><button class="btn btn-danger" type="button" name="button">Apagar descrição</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
