<?php

namespace Database\Seeders;

use App\Models\Statuses;
use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    public function run(): void
    {
        Statuses::factory()->create([
            'name' => 'новая'
        ]);
        Statuses::factory()->create([
            'name' => 'завершена'
        ]);
        Statuses::factory()->create([
            'name' => 'выполняется'
        ]);
        Statuses::factory()->create([
            'name' => 'в архиве'
        ]);
    }
}
