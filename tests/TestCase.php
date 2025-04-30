<?php

declare(strict_types=1);

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase;

    protected function actingAsAdmin(?User $user = null): User
    {
        $user = $user ?? User::factory()->admin()->create();
        $this->actingAs($user);

        return $user;
    }
}
