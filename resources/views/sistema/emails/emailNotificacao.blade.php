@extends('master')


@section('titulo')

PRAE - Nova notícia!

@endsection

@section('conteudo')

  @if($noticia)

    <p>Uma nova notícia foi publicada!</p>

    <p><b>{{ $noticia->titulo }}</b></p><br>
    <a href="{{ $noticia->guid }}">Notícia completa</a><br>
    <form class="" action="{{ route('ws.cancelarNotificacoesEmail') }}" method="post">
        <input type="hidden" name="token" value="{{ $email->token }}">
        <button class="btn btn-primary" type="submit" name="button">Cancelar recebimento de notificações</button>
    </form>

  @else
    <p>Uma nova notícia foi publicada!</p>
  @endif

@endsection
