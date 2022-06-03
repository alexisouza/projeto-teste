<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacoes extends Model
{
    protected $fillable = ['titulo', 'tipo', 'cliente_nome', 'cliente_email', 'cliente_telefone', 'descricao'];
    
    use HasFactory;
}