@extends('admin.layout.app')

@section('title', 'Gestão de Produtos')    

@section('content')

    <h1>Painel Administrativo</h1>

    <hr>
    <a href="{{ url('/produtos') }}">Gerenciar Produtos</a>
    <br/>
    <a href="{{ url('/listarclientes')}}">Listar Clientes</a>
    <br/>
    <a href="{{ url('/gerenciarpedidos')}}">Gerenciar Pedidos</a>