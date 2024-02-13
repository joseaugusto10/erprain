<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estoque;

class EstoqueSeeder extends Seeder
{
    public function run()
    {
        Estoque::create([
            'produto_id' => 1,
            'quantidade' => 100,
        ]);

        Estoque::create([
            'produto_id' => 2,
            'quantidade' => 50,
        ]);

        // Adicione mais registros de estoque conforme necessário

    }
}
