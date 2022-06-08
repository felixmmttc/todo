<?php

namespace App\Console\Commands;

use App\Jobs\ScrapKRA;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Bus;

class ScrapNationalRegistrationDetailsCommand extends Command
{
    protected $signature = 'scrap:kra {min=1} {max=100}';

    protected $description = 'Get national identification details';

    public function handle()
    {

        $jobs = [];
        $this->info("Starting scrap");

        foreach (range($this->argument('min'), $this->argument('max')) as $i) {
            $jobs[] = new ScrapKRA($i);
        }
        $this->info("Batched jobs successfully");

        Bus::chain($jobs)
           ->dispatch()
        ;

        return self::SUCCESS;
    }
}
