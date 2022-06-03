<?php

namespace App\Http\Controllers;

use App\Models\Solicitacoes;
use Illuminate\Http\Request;

class SolicitacoesController extends Controller
{
    public function index(Request $request)
    {
        $busca = $request->query('busca');
        if (!empty($busca)) {
            $solicitacoes = Solicitacoes::where('solicitacoes.titulo', 'like', '%'.$busca.'%')
                ->orWhere('solicitacoes.cliente_nome', 'like', '%'.$busca.'%')
                ->orWhere('solicitacoes.cliente_email', 'like', '%'.$busca.'%')
                ->paginate(5);
        } else {
            $solicitacoes = Solicitacoes::paginate(5);
        }

        return view('solicitacoes.index', [
            'solicitacoes' => $solicitacoes,
            'qtd_solicitacoes' => count($solicitacoes),
            'busca' => $busca
        ]);
    }

    public function create()
    {
        return view('solicitacoes.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'titulo' => 'required|max:100',
            'tipo' => 'required',
            'cliente_nome' => 'required|max:100',
            'cliente_email' => 'required|max:100|email',
            'cliente_telefone' => 'required|max:30',
            'descricao' => 'required'
        ]);
        Solicitacoes::create($dados);

        $request->session()->flash('sucesso', 'Solicitação cadastrada com sucesso!');

        return redirect('/');
    }
}