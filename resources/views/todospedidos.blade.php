@extends('admin.layout.app')

@section('title', "Detalhes do Produto")    

@section('content')

    <h1>Histórico de Pedidos <a href="{{ url('paineladmin')}}"><<</a></h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Codigo do Cliente</th>
                <th>Codigo do Produto</th>
                <th>Data de Criação</th>
                <th>Status</th>
                <th>Alterações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
            <form method="POST" action="{{ route('pedidos.update', $pedido->id) }}">
                    <input style="display:none;" type="hidden" name="_method" value="PUT">
                    <input style="display:none;" type="text" name="_token" value="{{ csrf_token() }}">
                <tr>
                    <td>{{ $pedido->codigo_do_cliente }}</td>
                    <td>{{ $pedido->codigo_do_produto }}</td>
                    <td>{{ $pedido->data_de_criacao }}</td>
                    <td>{{-- $pedido->status --}}
                        <select id="status" name="status">
                            <option value="{{ $pedido->status }}">{{ $pedido->status }}</option>
                            <option value="Pendente">Pendente</option>
                            <option value="Em preparo">Em preparo</option>
                            <option value="Em entrega">Em entrega</option>
                            <option value="Entregue">Entregue</option>
                            <option value="Cancelado">Cancelado</option>
                        </select>
                    </td>
                    <td><button type="submit">Salvar</button></td>
                </tr>
            </form>
            @endforeach
        </tbody>
    </table>