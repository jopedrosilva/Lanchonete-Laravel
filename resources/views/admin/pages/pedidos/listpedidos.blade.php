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
                {{--<form method="POST" action="pedidos.destroy">
                    <input style="display:none;" type="hidden" name="_method" value="DELETE">
                    <input style="display:none;" type="text" name="_token" value="{{ csrf_token() }}">
                    {{--<input style="display:none;" type="text" name="codigo_do_cliente" value="{{ $pedido->codigo_do_cliente }}">
                    <input style="display:none;" type="text" name="codigo_do_produto" value="{{ $pedido->codigo_do_produto }}">
                    <input style="display:none;" type="text" name="data_de_criacao" value="{{ $pedido->data_de_criacao }}">
                    <input style="display:none;" type="text" name="status" value="Cancelar">--}}
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
                {{--</form>--}}
            @endforeach
        </tbody>
    </table>