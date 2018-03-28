@extends('master')

@section('titulo')
PRAE APP GERENCIAMENTO - Início
@endsection

@section('conteudo')
@include('nav')
<div class="row justify-content-center">
  <div class="col-sm-10 mt-3">
    @if( session()->has('mensagem') )
      <div class="alert alert-warning">
        <h5>{{ session('mensagem') }}</h5>
      </div>
    @endif
    </div>
  </div>
</div>
<div class="mt-5 pt-5">

@endsection
