<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(20)->create();

        \App\Models\Jobs::factory([
            'fotos' => [
                'https://media.gazetadopovo.com.br/2020/03/17172845/coronavirus-limpeza-bigstock-1-660x372.jpg'
            ],
            'preco' => '320000.00'
        ])->create();
        \App\Models\Jobs::factory([
            'fotos' => [
                'https://media.gazetadopovo.com.br/2020/03/17172845/coronavirus-limpeza-bigstock-1-660x372.jpg'
            ],
            'preco' => '320000.00'
        ])->create();
        \App\Models\Jobs::factory([
            'fotos' => [
                'https://media.gazetadopovo.com.br/2020/03/17172845/coronavirus-limpeza-bigstock-1-660x372.jpg'
            ],
            'preco' => '320000.00'
        ])->create();
        \App\Models\Jobs::factory([
            'fotos' => [
                'https://media.gazetadopovo.com.br/2020/03/17172845/coronavirus-limpeza-bigstock-1-660x372.jpg'
            ],
            'preco' => '320000.00'
        ])->create();
        \App\Models\Jobs::factory([
            'fotos' => [
                'https://media.gazetadopovo.com.br/2020/03/17172845/coronavirus-limpeza-bigstock-1-660x372.jpg'
            ],
            'preco' => '320000.00'
        ])->create();
    }
}
