<?php

namespace App\Console\Commands;

use App\Models\NationalRegistry;
use Illuminate\Console\Command;

class CleanUpDatabaseCommand extends Command
{
    protected $signature = 'cleanup:data';

    protected $description = 'Command description';

    public function handle()
    {
      $n =  NationalRegistry::where('isValidNID', "false")->delete();
    }
}
