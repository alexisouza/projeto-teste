@extends('app')

@section('conteudo')
<h1>Solicitações</h1>

@if (session('sucesso'))
<div class="alert alert-success alert-dismissible fade show">
    {{ session('sucesso') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<form class="form-inline" method="GET">
    <div class="row">
        <div class="col">
            <input type="text" id="busca" name="busca" class="form-control" value="{{ $busca }}">
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </div>
</form>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Título</th>
            <th scope="col">Tipo</th>
            <th scope="col">Descrição</th>
            <th scope="col">Data</th>
            <th scope="col">Solicitante</th>
            <th scope="col">Email</th>
            <th scope="col">Telefone</th>
            <th scope="col">Status</th>
            <th scope="col">Prioridade</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        @if ($qtd_solicitacoes > 0)
        @foreach ($solicitacoes as $solicitacao)
        <tr>
            <th>{{ $solicitacao->id }}</th>
            <td>{{ $solicitacao->titulo }}</td>
            <td>{{ $solicitacao->tipo }}</td>
            <td>{{ $solicitacao->descricao }}</td>
            <td>{{ $solicitacao->created_at->format('d/m/Y') }}</td>
            <td>{{ $solicitacao->cliente_nome }}</td>
            <td>{{ $solicitacao->cliente_email }}</td>
            <td>{{ $solicitacao->cliente_telefone }}</td>
            <td>{{ $solicitacao->status == 0 ? "Aguardando" : "Atendida" }}</td>
            <td>
                @if($solicitacao->status == 0)
                @if($solicitacao->created_at->isSameDay(now()))
                Baixa
                @elseif($solicitacao->created_at->isSameDay(now()->subDays(1)) ||
                $solicitacao->created_at->isSameDay(now()->subDays(2)))
                Média
                @else
                Alta
                @endif
                @endif
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <th colspan="8">Nenhuma solicitação encontrada</th>
        </tr>
        @endif
    </tbody>
</table>
{{ $solicitacoes->links() }}

<a class="btn btn-primary" href="{{ route('solicitacoes.create') }}">Nova Solicitação</a>
@endsection