@extends('admin.layout.app')

@section('title', 'Cadastrar Novo Produto')

@section('content')
    <h1>Cadastrar Novo Produto</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>        
    @endif

    <form action="{{ route('produtos.store') }}" method="post">

        <input style="display:none;" type="text" name="_token" value="{{ csrf_token() }}">
        <input type="text" name="nome" placeholder="Nome:">
        <input type="text" name="preco" placeholder="Preço:">
        <button type="submit">Cadastrar</button>
    </form>