@extends('admin.layout.app')

@section('title', 'Cadastro Cliente')

@section('content')
    <h1>Cadastro Cliente</h1>

    <hr>

    <form action="{{ route('clientes.store') }}" method="post">

        <input style="display:none;" type="text" name="_token" value="{{ csrf_token() }}">
        <br/>
        <input type="text" name="nome" placeholder="Nome:">
        <br/>
        <input type="text" name="email" placeholder="Email:">
        <br/>
        <input type="text" name="telefone" placeholder="Telefone:">
        <br/>
        <input type="text" name="endereco" placeholder="Endereço:">
        <br/>
        <button type="submit">Cadastrar</button>
    </form>