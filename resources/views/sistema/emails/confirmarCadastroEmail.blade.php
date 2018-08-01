@extends('master')


@section('titulo')

PRAE - Confirmação de cadastro de email

@endsection

@section('conteudo')

  @if($email)
    <p>O email {{ $email->email }} foi cadastrado com sucesso!</p><br>
      <form class="" action="{{ route('ws.cancelarNotificacoesEmail') }}" method="post">
          <input type="hidden" name="token" value="{{ $email->token }}">
          <button class="btn btn-primary" type="submit" name="button">Cancelar recebimento de notificações</button>
      </form>
  @else
    <p>O email foi cadastrado com sucesso!</p>
  @endif

@endsection
