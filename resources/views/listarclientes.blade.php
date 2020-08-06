@extends('admin.layout.app')

@section('title', 'Lista de Clientes')

@section('content')

    <h1>Lista de Clientes <a href="{{ url('/paineladmin') }}"><<</a></h1>

    <hr>

    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Endereço</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                <td>{{ $cliente->nome }}</td>
                <td>{{ $cliente->email }}</td>
                <td>{{ $cliente->telefone }}</td>
                <td>{{ $cliente->endereco }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>