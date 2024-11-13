<?php

namespace Tests\Feature\Status;

use App\Models\Status;
use Tests\TestCase;


class AddStatusTest extends TestCase
{

/*    public function test_status_screen_can_be_rendered(): void
    {
        $response = $this->get('/task_statuses');

        $response->assertStatus(200);
    }

    public function test_can_add_new_status()
    {
        $status = Status::factory()->create();

        $response = $this->post('task_statuses/create', [
            'name' => $status->name,
        ]);

        $response->assertRedirect();
    }

    public function test_can_not_add_two_same_statuses(): void
    {
        $status = Status::factory()->create();

        $response = $this->post('task_statuses/create', [
            'name' => $status->name,
        ]);

        $response->assertRedirect();

        $response = $this->post('task_statuses/create', [
            'name' => $status->name,
        ]);

        $response->assertSessionHasErrors();
    }*/
}
