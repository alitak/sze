<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class AdminTest extends TestCase
{
    public function testAdminPageCannotBeReachedByGuest(): void
    {
        $this->get(route('admin.albums.index'))
            ->assertStatus(404);
    }

    #[Test]
    public function testAdminPageCannotBeReachedByUser()
    {
//        $user = User::factory()->create([
//            'is_admin' => false,
//        ]);
        $user = User::factory()->user()->create();

        $this->actingAs($user);

        $this->get(route('admin.albums.index'))
            ->assertStatus(404);
        $this->get(route('admin.artists.index'))
            ->assertStatus(404);
        $this->get(route('admin.labels.index'))
            ->assertStatus(404);
    }

    #[Test]
    public function testAdminPageCanBeReachedByAdmin()
    {
        $user = User::factory()->admin()->create();

        $this->actingAs($user);

        $this->get(route('admin.albums.index'))
            ->assertStatus(200);
        $this->get(route('admin.artists.index'))
            ->assertStatus(200);
        $this->get(route('admin.labels.index'))
            ->assertStatus(200);
    }
}
