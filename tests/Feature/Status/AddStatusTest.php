<?php

namespace Tests\Feature\Status;

use App\Models\Statuses;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddStatusTest extends TestCase
{
    use RefreshDatabase;

    public function testStatusScreenCanBeRendered(): void
    {
        $response = $this->get('/task_statuses');

        $response->assertStatus(200);
    }

    public function testCanAddNewStatus(): void
    {
        $status = Statuses::factory()->create();

        $response = $this->post('task_statuses/create', [
            'name' => $status->name,
        ]);

        $response->assertRedirect();
    }


    public function testIndex(): void
    {
        $status = new Statuses();

        $statuses = Statuses::factory()
            ->count(5)
            ->create()
            ->pluck('name')
            ->all();

        $response = $this->get(route('statuses'));
        $response->assertStatus(200);
        $response->assertSee($statuses);
        $this->assertDatabaseCount(Statuses::class, 5);
    }
}
