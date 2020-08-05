@extends('admin.layout.app')

@section('title', 'Editar Produto')

@section('content')
<h1>Editar Produto {{ $id }}</h1>

    <form action="{{ route('produtos.update', $id) }}" method="post">
        <input type="hidden" name="_method" value="PUT">
        <input style="display:none;" type="text" name="_token" value="{{ csrf_token() }}">
        <input type="text" name="nome" placeholder="Nome:">
        <input type="text" name="descricao" placeholder="Preço:">
        <button type="submit">Cadastrar</button>
    </form>
@endsection