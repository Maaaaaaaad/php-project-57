<?php

namespace Database\Seeders;

use App\Models\Labels;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Labels::factory()->create([
            'name' => 'ошибка',
            'description'=> 'Какая-то ошибка в коде или проблема с функциональностью'
        ]);
        Labels::factory()->create([
            'name' => 'документация',
            'description' => 'Задача которая касается документации'
        ]);
        Labels::factory()->create([
            'name' => 'дубликат',
            'description' => 'Повтор другой задачи'
        ]);
        Labels::factory()->create([
            'name' => 'доработка',
            'description' => 'Новая фича, которую нужно запилить'
        ]);
    }
}
