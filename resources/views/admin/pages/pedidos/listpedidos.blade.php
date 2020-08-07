@extends('admin.layout.app')

@section('title', "Detalhes do Produto")    

@section('content')

    <h1>Seus Pedidos <a href="{{ route('clientes.index')}}"><<</a></h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Codigo do Cliente</th>
                <th>Codigo do Produto</th>
                <th>Data de Criação</th>
                <th>Status</th>
                <th>Ação</th>  
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->codigo_do_cliente }}</td>
                    <td>{{ $pedido->codigo_do_produto }}</td>
                    <td>{{ $pedido->data_de_criacao }}</td>
                    <td>{{ $pedido->status }}</td>
                    <td>
                        <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <input style="display:none;" type="text" name="_token" value="{{ csrf_token() }}">
                            <button type="submit">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>