<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;

class JobsSeeder extends Seeder
{
    public function run(): void
    {
        Job::query()
            ->create([
                'company_id' => 1,
                'name' => 'Főállású programozó',
                'salary' => '800k - 900k',
            ]);
    }
}
