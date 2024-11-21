<?php

namespace Tests\Feature\Status;

use App\Models\TaskStatuses;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class AddStatusTest extends TestCase
{
    use RefreshDatabase;
    public function test_status_screen_can_be_rendered(): void
    {
        $response = $this->get('/task_statuses');

        $response->assertStatus(200);
    }

    public function test_can_add_new_status() : void
    {
        $status = TaskStatuses::factory()->create();

        $response = $this->post('task_statuses/create', [
            'name' => $status->name,
        ]);

        $response->assertRedirect();
    }

    public function test_can_not_add_two_same_statuses(): void
    {
        $status = TaskStatuses::factory()->create();

        $response = $this->post('task_statuses/create', [
            'name' => $status->name,
        ]);

        $response->assertRedirect();

        $response = $this->post('task_statuses/create', [
            'name' => $status->name,
        ]);

        $response->assertSessionHasErrors();
    }

    public function testIndex(): void
    {
        $status = new TaskStatuses();

        $statuses = TaskStatuses::factory()
            ->count(5)
            ->create()
            ->pluck('name')
            ->all();

        $response = $this->get(route('statuses'));
        $response->assertStatus(200);
        $response->assertSee($statuses);
        $this->assertDatabaseCount(TaskStatuses::class, 5);
    }
}
