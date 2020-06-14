<?php

use Illuminate\Database\Seeder;
use App\Conta;

class AccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->conta = Conta::create([
            'conta' => 54321,
            'saldo' => 160
        ]);

    }
}
