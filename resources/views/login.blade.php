@extends('master')

@section('titulo')
PRAE APP GERENCIAMENTO - Início
@endsection

@section('conteudo')
@include('nav')
<div class="mt-5 pt-5"></div>
@if( $errors->any() )
<div class="alert alert-warning mt-5 pt-5">
  @foreach($errors->all() as $error)
    <div class="alert alert-danger">
      {{ $error }}
    </div>
  @endforeach
</div>
@endif
@endsection
