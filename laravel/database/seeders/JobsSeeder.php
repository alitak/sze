<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;

class JobsSeeder extends Seeder
{
    public function run(): void
    {
        Job::query()
            ->firstOrCreate([
                'name' => 'Főállású programozó',
            ], [
                'company_id' => 1,
                'salary' => '800k - 900k',
            ]);
    }
}
