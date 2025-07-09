<?php

namespace App\Console\Commands;

use App\Models\Position;
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
//        $this->prepareData();
        $position = Position::find(1);
        dd($position->workers->toArray());
    }

    private function prepareData()
    {
        $position1 = Position::create([
            'title' => 'Developer'
        ]);

        $position2 = Position::create([
            'title' => 'Manager'
        ]);

        $workerData1 = [
            'name'=> 'Ivan',
            'surname'=> 'Ivanov',
            'email'=> 'ivanov@mail.ru',
            'position_id' => $position1->id,
            'age'=> '32',
            'description'=> 'asdasdsa',
            'is_married'=> 'false'
        ];

        $workerData2 = [
            'name'=> 'Carl',
            'surname'=> 'Cars',
            'email'=> 'carsonCarl@mail.ru',
            'position_id' => $position2->id,
            'age'=> '25',
            'description'=> 'asdasdsaadasdsa',
            'is_married'=> 'true'
        ];

        $workerData3 = [
            'name'=> 'Jannet',
            'surname'=> 'Shluxa',
            'email'=> 'savaka@mail.ru',
            'position_id' => $position1->id,
            'age'=> '43',
            'description'=> 'blyad',
            'is_married'=> 'true'
        ];

        $worker1 = Worker::create($workerData1);
        $worker2 = Worker::create($workerData2);
        $worker3 = Worker::create($workerData3);

        $profileData1 = [
            'worker_id' => $worker1->id,
            'skill' => 'Coder',
            'city' => 'Tokio',
            'experience' => '5',
            'finished_study_at' => '2020-07-01'
        ];

        $profileData2 = [
            'worker_id' => $worker2->id,
            'skill' => 'Boss',
            'city' => 'RioDejanero',
            'experience' => '10',
            'finished_study_at' => '2014-07-28'
        ];

        $profileData3 = [
            'worker_id' => $worker3->id,
            'skill' => 'Blyat',
            'city' => 'Moscow',
            'experience' => '40',
            'finished_study_at' => '2001-07-28'
        ];

        Profile::create($profileData1);
        Profile::create($profileData2);
        Profile::create($profileData3);

    }
}
