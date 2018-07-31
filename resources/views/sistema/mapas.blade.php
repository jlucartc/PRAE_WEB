@extends('master')

@section('titulo')
PRAE - Mapas
@endsection

@section('conteudo')
@include('nav')
<div class="row justify-content-center">
  <div class="col-sm-10">
    <h1 class="mt-5 pt-5 mb-3">Mapas <a href="{{ route('sistema.adicionarMapa') }}" class="btn btn-secondary float-right" name="button" title="adicionar mapa">Adicionar mapa<i class="fas fa-plus ml-2"></i></a> </h1>
    @if( !$mapas->isEmpty() )
      <div class="list-group">
        @foreach( $mapas as $mapa )
          <a class="list-group-item border border-dark">{{ ucfirst($mapa->nome) }}    <div class="d-inline float-right"> <form class="form-inline d-inline" action="{{ route('baixarMapa',['id' => $mapa->id]) }}" method="GET"><button type="submit" class="btn btn-success mr-2">Baixar mapa</button></form> <button class="btn btn-danger" type="button" name="button" data-toggle="modal" data-target="#confirmarDelecaoMapa{{ $mapa->id }}" >Apagar mapa</button> </div>      </a>
          <div class="modal fade" id="confirmarDelecaoMapa{{ $mapa->id }}">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                        <h3>Confirmar deleção de mapa</h3>
                      </div>
                      <div class="modal-body">
                          Deseja mesmo deletar o mapa?
                      </div>
                      <div class="modal-footer">
                        <form class="form" action="{{ route('sistema.deletarMapa',['id' => $mapa->id ]) }}" method="post">
                              {{ csrf_field() }}
                              <button type="submit" class="btn btn-success mr-2" name="button">Confirmar</button><button class="btn btn-danger" type="button" data-dismiss="modal" name="button">Cancelar</button>
                        </form>
                      </div>
                  </div>
              </div>
          </div>
        @endforeach
      </div>
    @else
      <div class="alert alert-info">
        Não há mapas cadastrados nesta categoria
      </div>
    @endif
  </div>
</div>

@endsection
