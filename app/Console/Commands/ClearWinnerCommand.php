<?php

namespace App\Console\Commands;

use App\Models\Winner;
use Illuminate\Console\Command;

class ClearWinnerCommand extends Command
{
    protected $signature = 'clear:winner';

    protected $description = 'Command description';

    public function handle(): void
    {
        Winner::query()->truncate();
    }
}
