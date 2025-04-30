<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
    public function testTheApplicationReturnsASuccessfulResponse(): void
    {
        $this->get('/')
            ->assertStatus(200);
    }
}
