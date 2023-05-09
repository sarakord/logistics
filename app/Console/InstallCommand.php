<?php

namespace App\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Input\InputArgument;

class InstallCommand extends Command
{
    /**

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install project with migrations and seed.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Install...');

        $this->info('migrate city table');
        Artisan::call('migrate --path=database/migrations/2023_05_06_072117_create_cities_table.php');

        $this->info('migrate');
        $this->call('migrate');

        $this->info('seed');
        $this->call('db:seed');

        return 0;
    }
}
