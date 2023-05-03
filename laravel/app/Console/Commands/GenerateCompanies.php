<?php

namespace App\Console\Commands;

use App\Models\Company;
use Illuminate\Console\Command;

class GenerateCompanies extends Command
{
    protected $signature = 'generate:companies';
    protected $description = 'Generate companies.';

    public function handle()
    {
//        Company::factory()->create();

//        $this->line('foo bar');
//        $this->error('foo bar');
//        $this->info(Company::query()->find(3));
//
//        $this->table(
//            ['ID', 'NAME'],
//            Company::all(['id', 'name'])
//        );
//        $this->comment('foo bar');

        $companies = Company::all();

        $bar = $this->output->createProgressBar(count($companies));

        $bar->start();

        foreach ($companies as $company) {
            $bar->advance();
            sleep(1);
        }

        $bar->finish();


        return Command::SUCCESS;
    }
}
