<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\TaskStatuses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    public function run(): void
    {
        TaskStatuses::factory()->create([
            'name' => 'новая'
        ]);
        TaskStatuses::factory()->create([
            'name' => 'завершена'
        ]);
        TaskStatuses::factory()->create([
            'name' => 'выполняется'
        ]);
        TaskStatuses::factory()->create([
            'name' => 'в архиве'
        ]);
    }
}
