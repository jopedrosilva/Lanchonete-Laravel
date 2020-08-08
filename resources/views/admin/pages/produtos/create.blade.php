@extends('admin.layout.app')

@section('title', 'Cadastrar Novo Produto')

@section('content')
    <h1>Cadastrar Novo Produto</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>        
    @endif

    <form name="formproduto" action="{{ route('produtos.store') }}" method="post">

        <input style="display:none;" type="text" name="_token" value="{{ csrf_token() }}">
        <input type="text" name="nome" placeholder="Nome:">
        <input type="text" name="preco" placeholder="Preço:">
        <button type="submit" onclick="return validar()">Cadastrar</button>
    </form>

    <script type="text/javascript">
        function validar(){
            var nome = formproduto.nome.value;
            var preco = formproduto.preco.value;
                
            if(nome == "" || nome == null){
                alert('Preencha o campo nome corretamente.');
                formproduto.nome.focus();
                return false;
            }
                
            if(preco == "" || preco == null ){
                alert('Preencha o campo preço corretamente.');
                formproduto.preco.focus();
                return false;
            }
        }
    </script>