@extends('admin.layout.app')

@section('title', 'Cadastrar Novo Produto')

@section('content')
    <h1>Cadastrar Novo Produto</h1>

    <form action="{{ route('produtos.store') }}" method="post">

        <input style="display:none;" type="text" name="_token" value="{{ csrf_token() }}">
        <input type="text" name="nome" placeholder="Nome:">
        <input type="text" name="preco" placeholder="Preço:">
        <button type="submit">Cadastrar</button>
    </form>