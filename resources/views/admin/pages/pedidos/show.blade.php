@extends('admin.layout.app')

{{--@section('title', "Detalhes do Produto {$produto->nome}")--}}

@section('content')

<h1>Produto {{ $produto->nome }} <a href="{{ route('produtos.index')}}"><<</a></h1>

<ul>
    <li><strong>Nome: </strong>{{ $produto->nome }}</li>
    <li><strong>Preço: </strong>{{ $produto->preco}}</li>
</ul>
