<?php

namespace Database\Seeders;

use App\Models\Seller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Sellers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Seller::insert([
            ['name' => 'Ariel Anchapaxi', 'email' => 'ariel.anchapaxi@udla.edu.ec'],
            ['name' => 'Joel Suarez', 'email' => 'joel.suarez@udla.edu.ec'],
            ['name' => 'Junion Espin', 'email' => 'junior.espin@udla.edu.ec'],
            ['name' => 'Daniel Ortiz', 'email' => 'daniel.ortiz@udla.edu.ec'],
        ]);
    }
}
