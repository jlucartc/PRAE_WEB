@extends('master')

@section('titulo')

    Aplicativo da PRAE - Download

@endsection
@section('conteudo')
<div class="row justify-content-center">
  <div class="col-sm-3 mt-3 pb-3 ">
      <h1 class="text-dark">Aplicativo PRAE</h1><br>
      <div class="container">
          <div class="row">
              <div class="col-sm-2"></div>
              <img class="image-fluid col-sm-8 h-50" src="{{asset('ufc.png')}}" alt="brasão UFC" ><br><br>
              <div class="col-sm-2"></div>
          </div>
      </div><br>
      <form class="form-group" action="{{ route('app.download.apk') }}" method="post">
          {{ csrf_field() }}
          <button class="btn btn-lg btn-primary btn-block" type="submit" name="button"><span class="fa fa-download"></span> Download</button>
      </form>
    </div>
 </div>
@endsection
