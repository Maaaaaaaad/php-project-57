<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    public function run(): void
    {
        Status::factory()->create([
            'name' => 'новый'
        ]);
        Status::factory()->create([
            'name' => 'в работе'
        ]);
        Status::factory()->create([
            'name' => 'на тестировании'
        ]);
        Status::factory()->create([
            'name' => 'завершен'
        ]);
    }
}
