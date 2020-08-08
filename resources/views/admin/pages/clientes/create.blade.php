@extends('admin.layout.app')

@section('title', 'Cadastro Cliente')

@section('content')

    <h1>Cadastro Cliente</h1>

    <hr>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>        
    @endif

    <form name="formcliente" action="{{ route('clientes.store') }}" method="post">

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
        <button type="submit" onclick="return validarcliente()">Cadastrar</button>
    </form>


    <script type="text/javascript">
        function validarcliente(){
            var nome = formcliente.nome.value;
            var email = formcliente.email.value;
            var telefone = formcliente.telefone.value;
            var endereco = formcliente.endereco.value;
                
            if(nome == "" || nome == null){
                alert('Preencha o campo nome corretamente.');
                formcliente.nome.focus();
                return false;
            }

            if(email == "" || email == null || email.indexOf('@') == -1){
                alert('Preencha o campo email corretamente.');
                formcliente.email.focus();
                return false;
            }

            if(telefone == "" || telefone == null){
                alert('Preencha o campo telefone corretamente.');
                formcliente.telefone.focus();
                return false;
            }
                
            if(endereco == "" || endereco == null){
                alert('Preencha o campo endereço corretamente.');
                formcliente.endereco.focus();
                return false;
            }
        }
    </script>