@extends('admin.layout.app')

@section('title', 'Painel Cliente')    

@section('content')

    <h1>Painel Cliente</h1>

    <hr>

    
    @foreach ($clientes as $cliente)
        <tr>
            <td>{{ $cliente->nome }}</td>
        </tr>
    @endforeach

    Cadastrou...