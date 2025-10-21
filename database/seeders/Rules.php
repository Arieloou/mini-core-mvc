<?php

namespace Database\Seeders;

use App\Models\Rule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Rules extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rule::insert([
            ['percentage' => 0.00, 'threshold_amount' => 0],
            ['percentage' => 0.06, 'threshold_amount' => 600],
            ['percentage' => 0.08, 'threshold_amount' => 500],
            ['percentage' => 0.10, 'threshold_amount' => 800],
            ['percentage' => 1.15, 'threshold_amount' => 1000],
        ]);
    }
}
