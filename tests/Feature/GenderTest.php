<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GenderTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $user = User::first();
        $this->actingAs($user);
    }

    public function test_store_gender(): void
    {
        $gender = [
            'name' => fake()->name(),
        ];

        $this->postJson(route('gender.store'), $gender)
            ->assertSuccessful()
            ->assertJsonStructure([
                'message'
            ]);

        $this->assertDatabaseHas('genders', $gender);
    }
}
