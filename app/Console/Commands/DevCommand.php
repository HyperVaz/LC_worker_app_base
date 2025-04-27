<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DevCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'develop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Выполняет кастомные действия(хэндлер)';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        dd(1111111111111);
        return 0;
    }
}
