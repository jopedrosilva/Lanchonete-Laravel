@extends('admin.layout.app')

@section('title', "Lanchonete")    

@section('content')
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
           {{--@if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                        <a href="{{ route('login') }}">Painel Administrativo</a>

                    @endauth
                </div>
            @endif--}}

            @if (Route::has('login'))
                <div class="top-right links">    
                    @auth
                        <a href="{{ url('/paineladmin') }}">Painel Administrativo</a>
                    @else
                        <a href="{{ route('login') }}">Login Administrativo</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Lanchonete
                </div>

                {{--<div class="links">
                    @if (Route::has('login'))
                        
                    @endif
                    <a href="{{ url('/produtos') }}">Cadastro Cliente</a>
                </div>--}}

                <h1>Produtos Disponíveis</h1>

                <hr>

                {{--
                    <form action="{{ route('produtos.search') }}" method="POST" class="form">
                    <input style="display:none;" type="text" name="_token" value="{{ csrf_token() }}">  
                    <input type="text" name="filter" placeholder="Pesquisar: ">
                    <button type="submit">Pesquisar</button>
                </form>
                --}}

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
                                <a href="{{ route('clientes.create')}}">Comprar</a>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </body>
</html>
