<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financeiro extends Model
{
    use HasFactory;

    protected $fillable = ['valor', 'data_transacao'];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
