@extends('admin.layout.app')

@section('title', 'Lista de Clientes')

@section('content')

    <h1>Lista de Clientes <a href="{{ url('/paineladmin') }}"><<</a></h1>

    <hr>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Endereço</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                <td>{{ $cliente->id }}</td>
                <td>{{ $cliente->nome }}</td>
                <td>{{ $cliente->email }}</td>
                <td>{{ $cliente->telefone }}</td>
                <td>{{ $cliente->endereco }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>