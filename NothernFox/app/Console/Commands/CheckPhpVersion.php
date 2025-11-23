<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckPhpVersion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-php-version';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('PHP Version: ' . PHP_VERSION);
        $this->info('Laravel Version: ' . app()->version());
        $this->info('Extensions: ' . implode(', ', get_loaded_extensions()));

        return Command::SUCCESS;
    }
}
