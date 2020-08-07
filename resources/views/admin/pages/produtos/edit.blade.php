@extends('admin.layout.app')

@section('title', "Editar Produto {$produto->nome}")

@section('content')
<h1>Editar Produto {{ $produto->nome }}</h1>

    <form action="{{ route('produtos.update', $produto->id) }}" method="post">
        <input type="hidden" name="_method" value="PUT">
        <input style="display:none;" type="text" name="_token" value="{{ csrf_token() }}">
        <input type="text" name="nome" placeholder="Nome:" value="{{ $produto->nome }}">
        <input type="text" name="preco" placeholder="Preço:" value="{{ $produto->preco }}">
        <button type="submit">Cadastrar</button>
    </form>