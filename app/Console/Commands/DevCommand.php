<?php

namespace App\Console\Commands;

use App\Models\Profile;
use App\Models\Worker;
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
        $worker = Worker::find(1);
        $profile = Profile::find(1);

        dd($worker->profile->toArray());
    }

    private function prepareData()
    {
        $workerData = [
            'name'=> 'Ivan',
            'surname'=> 'Ivanov',
            'email'=> 'ivanov@mail.ru',
            'age'=> '32',
            'description'=> 'asdasdsa',
            'is_married'=> 'false'
        ];
        $worker = Worker::create($workerData);

        $profileData = [
            'worker_id' => $worker->id,
            'skill' => 'Coder',
            'city' => 'Tokio',
            'experience' => '5',
            'finished_study_at' => '2020-07-01'
        ];

        $profile = Profile::create($profileData);

        dd($profile->id);
    }
}
