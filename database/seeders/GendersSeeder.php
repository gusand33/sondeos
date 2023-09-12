<?php

namespace Database\Seeders;

use App\Models\Books\BooksGender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GendersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            'Misterio', 
            'Ciencia ficción', 
            'Romance', 
            'Drama',
            'Aventura', 
            'Acción', 
            'Terror', 
            'Histórico', 
            'Biografía', 
            'Filosofía',
            'Política', 
            'Negocios', 
            'Autoayuda'
        ];

        foreach ($array as $value) {
            $gender = new BooksGender();
            $gender->name = $value;
            $gender->save();
        }
    }
}
