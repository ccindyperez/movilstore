<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Agregar categorías específicas
        $categories = ['Fundas', 'Micas', 'Audio', 'Cargadores', 'Cables'];

        foreach ($categories as $category) {
            Category::create([
                'nameCategory' => $category, // Ajusta esto según los campos en tu modelo Category
            ]);
        }
    }
}
