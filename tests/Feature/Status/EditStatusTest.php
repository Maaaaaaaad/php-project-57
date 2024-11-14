<?php

namespace Tests\Feature\Status;

use App\Models\Status;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class EditStatusTest extends TestCase
{
    use RefreshDatabase;
    public function test_can_edit_status()
    {
        $statusOld = Status::factory()->create();


        $response = $this->patch(route('status.update', ["id" => "$statusOld->id"] ), [
            'name' => 'new name',
        ]);

        $this->assertDatabaseHas('statuses', [
            'name' => 'new name'
        ]);
    }
}
