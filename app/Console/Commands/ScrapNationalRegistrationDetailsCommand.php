<?php

namespace App\Console\Commands;

use App\Jobs\ScrapKRA;
use App\Models\NationalRegistry;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Http;
use function preg_match;
use function str_replace;

class ScrapNationalRegistrationDetailsCommand extends Command
{
    protected $signature = 'scrap:kra {min=1} {max=100}';

    protected $description = 'Get national identification details';

    public function handle()
    {

        $jobs = [];

        foreach (range(1,10000) as $i) {

            $jobs[] = new ScrapKRA($i);
        }

      Bus::chain($jobs)
              ->dispatch();

    }
}
