<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'preco'];

    public function estoque()
    {
        return $this->hasOne(Estoque::class);
    }

    public function financeiro()
    {
        return $this->hasOne(Financeiro::class);
    }
}
