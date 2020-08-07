@extends('admin.layout.app')

@section('title', 'Painel Cliente')    

@section('content')

    <h1>Painel Cliente</h1>

    <hr>

    <h5>Bem Vindo, {{ $teste->nome }}</h5>

    <hr>

    <a href="{{ route('pedidos.listpedidos', $teste->id) }}">Meus Pedidos</a>

    <hr>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Comprar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->preco }}</td>
                    <td>
                        <form action="{{ route('pedidos.store') }}" method="POST">
                            <input style="display:none;" type="text" name="_token" value="{{ csrf_token() }}">
                            <input style="display:none;" type="text" name="codigo_do_cliente" value="{{ $teste->id }}">
                            <input style="display:none;" type="text" name="codigo_do_produto" value="{{ $produto->id }}">
                            <input style="display:none;" type="text" name="data_de_criacao" value="<?php $data = new DateTime();
                            echo $data->format('Y-m-d H:i:s');?>">
                            <input style="display:none;" type="text" name="status" value="Pendente">
                            <button type="submit">Comprar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>