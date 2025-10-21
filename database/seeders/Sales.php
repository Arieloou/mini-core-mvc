<?php

namespace Database\Seeders;

use App\Models\Sale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Sales extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sale::insert([
            ['seller_id' => 1, 'date' => '2025-06-02', 'amount' => 650],
            ['seller_id' => 1, 'date' => '2025-06-15', 'amount' => 850],

            ['seller_id' => 2, 'date' => '2025-06-05', 'amount' => 500],
            ['seller_id' => 2, 'date' => '2025-06-20', 'amount' => 1200],

            ['seller_id' => 3, 'date' => '2025-06-10', 'amount' => 300],

            ['seller_id' => 4, 'date' => '2025-06-12', 'amount' => 900],
            ['seller_id' => 4, 'date' => '2025-05-28', 'amount' => 700], // out of range example
        ]);
    }
}
