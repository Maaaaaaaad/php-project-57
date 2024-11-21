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
            'name' => 'новая'
        ]);
        Status::factory()->create([
            'name' => 'завершена'
        ]);
        Status::factory()->create([
            'name' => 'выполняется'
        ]);
        Status::factory()->create([
            'name' => 'в архиве'
        ]);
    }
}
