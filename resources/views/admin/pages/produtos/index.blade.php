@extends('admin.layout.app')

@section('title', 'Gestão de Produtos')    

@section('content')

    <h1>Exibindo os Produtos</h1>

<a href="{{ route('produtos.create') }}">Cadastar</a>

    <hr>

    @include('admin.includes.alerts')

    <hr>

    @if(isset($produtos))
        @foreach ($produtos as $produto)
            <p> {{$produto}} </p>   
        @endforeach
    @endif

    <hr>

    @forelse ($produtos as $produto)
        <p> {{$produto}} </p>   
    @empty
        <p> Não Existem produtos cadastrados </p>   
    @endforelse

    {{ $teste }}

@endsection
