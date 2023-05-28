<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_tasks_page_is_displayed(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get(route('tasks.index'));
        $response
        ->assertSee('tasks')
        ->assertSessionHasNoErrors()
        ->assertOk();
    }

    public function test_task_can_be_created(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $data = [
            'title' => fake()->text(),
            'description' => fake()->text(),
        ];

        $response = $this->post(route('tasks.store'), $data);
        $response
        ->assertRedirect(route('tasks.index'));
        $this->assertDatabaseHas('tasks', [
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $user->id,
        ]);
    }

    public function test_task_can_be_updated(): void
    {

        $user = User::factory()->create();
        $task = Task::factory()->create([
            'user_id' => $user->id,
        ]);

        $this->actingAs($user);
        $data = [
            'title' => 'Updated Task',
            'description' => 'This task has been updated.',
            'is_completed' => fake()->boolean(),
            'id' => $task->id,
        ];

        $response = $this->patch(route('tasks.update', $task->id), $data);
        $response
        ->assertRedirect(route('tasks.index'));
        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'title' => $data['title'],
            'description' => $data['description'],
            'is_completed' => $data['is_completed'],
            'completed_at' => now(),
        ]);
    }

    public function test_task_can_be_deleted(): void
    {
        $user = User::factory()->create();
        $task = Task::factory()->create([
            'user_id' => $user->id,
        ]);

        $this->actingAs($user);
        $requestData = [
            'task_id' => $task->id,
        ];

        $response = $this->delete(route('tasks.destroy', $task->id), $requestData);

        $response->assertRedirect(route('tasks.index'));
        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
        ]);
    }

}
