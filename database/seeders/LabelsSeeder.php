<?php

namespace Database\Seeders;

use App\Models\TaskLabels;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TaskLabels::factory()->create([
            'name' => 'ошибка',
            'description'=> 'Какая-то ошибка в коде или проблема с функциональностью'
        ]);
        TaskLabels::factory()->create([
            'name' => 'документация',
            'description' => 'Задача которая касается документации'
        ]);
        TaskLabels::factory()->create([
            'name' => 'дубликат',
            'description' => 'Повтор другой задачи'
        ]);
        TaskLabels::factory()->create([
            'name' => 'доработка',
            'description' => 'Новая фича, которую нужно запилить'
        ]);
    }
}
