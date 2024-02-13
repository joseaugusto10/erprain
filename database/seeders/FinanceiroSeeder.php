<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Financeiro;

class FinanceiroSeeder extends Seeder
{
    public function run()
    {
        Financeiro::create([
            'produto_id' => 1,
            'valor' => 500.00,
        ]);

        Financeiro::create([
            'produto_id' => 2,
            'valor' => 1200.00,
        ]);

        // Adicione mais registros financeiros conforme necessário
    }
}

