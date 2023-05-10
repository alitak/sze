<?php

namespace Api;

use App\Models\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JobsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_jobs()
    {
        $jobs = Job::factory(2)->create()->toArray();

        $response = $this->get('api/jobs');

        $response->assertOk();

        $result = $response->json()['data'];

        $this->assertCount(2, $result);

        $this->assertEquals([
            'id' => $jobs[0]['id'],
            'name' => $jobs[0]['name'],
            'salary' => $jobs[0]['salary'],
        ], $result[0]);

        $this->assertEquals([
            'id' => $jobs[1]['id'],
            'name' => $jobs[1]['name'],
            'salary' => $jobs[1]['salary'],
        ], $result[1]);
    }
}
