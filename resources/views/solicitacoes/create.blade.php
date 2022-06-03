@extends('app')

@section('conteudo')
<h1>Nova Solicitação</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('solicitacoes.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo">
    </div>
    <div class="mb-3">
        <label for="tipo" class="form-label">Tipo</label>
        <select name="tipo" id="tipo" class="form-control">
            <option value=""></option>
            <option value="Contábil">Contábil</option>
            <option value="Jurídica">Jurídica</option>
            <option value="Trabalhista">Trabalhista</option>
            <option value="Outros">Outros</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="cliente_nome" class="form-label">Nome do Cliente</label>
        <input type="text" class="form-control" id="cliente_nome" name="cliente_nome">
    </div>
    <div class="mb-3">
        <label for="cliente_email" class="form-label">Email do Cliente</label>
        <input type="email" class="form-control" id="cliente_email" name="cliente_email">
    </div>
    <div class="mb-3">
        <label for="cliente_telefone" class="form-label">Telefone do Cliente</label>
        <input type="text" class="form-control" id="cliente_telefone" name="cliente_telefone">
    </div>
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@endsection