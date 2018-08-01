@extends('master')


@section('titulo')

PRAE - Confirmação de cadastro de email

@endsection

@section('conteudo')

  @if($email)
    <p>O envio de notificações para {{ $email->email }} foi cancelado. Caso deseje receber as notificações novamente, cadastre seu endereço de email no aplicativo da PRAE.</p>
  @else
    <p>O envio de notificações para este email foi cancelado. Caso deseje receber as notificações novamente, cadastre seu endereço de email no aplicativo da PRAE.</p>
  @endif

@endsection
