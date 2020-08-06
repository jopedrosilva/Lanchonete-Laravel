@extends('admin.layout.app')

@section('title', 'Gestão de Produtos')    

@section('content')

    <h1>Exibindo os Produtos</h1>

    <a href="{{ route('produtos.create') }}">Cadastar</a>

    <hr>

    <form action="{{ route('produtos.search') }}" method="POST" class="form">
        <input style="display:none;" type="text" name="_token" value="{{ csrf_token() }}">  
        <input type="text" name="filter" placeholder="Pesquisar: ">
        <button type="submit">Pesquisar</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Detalhar</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                <td>{{ $produto->nome }}</td>
                <td>{{ $produto->preco }}</td>
                <td>
                    <a href="{{ route('produtos.show', $produto->id)}}">Detalhar</a>
                </td>
                <td>
                    <a href="{{ route('produtos.edit', $produto->id) }}">Editar</a>
                </td>
                <td>
                    <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input style="display:none;" type="text" name="_token" value="{{ csrf_token() }}">
                        <button type="submit">Deletar</button>
                    </form>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
