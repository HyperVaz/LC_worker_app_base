<?php

namespace App\Console\Commands;

use App\Models\Position;
use App\Models\Profile;
use App\Models\Project;
use App\Models\ProjectWorker;
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
//        $this->prepareManyToMany();

        $worker = Worker::find(2);
        dd($worker->projects->toArray());

    }

    private function prepareData()
    {
        $position1 = Position::create([
            'title' => 'Developer'
        ]);

        $position2 = Position::create([
            'title' => 'Manager'
        ]);

        $position3 = Position::create([
            'title' => 'Designer'
        ]);

        $workerData1 = [
            'name' => 'Ivan',
            'surname' => 'Ivanov',
            'email' => 'ivanov@mail.ru',
            'position_id' => $position1->id,
            'age' => '32',
            'description' => 'asdasdsa',
            'is_married' => 'false'
        ];

        $workerData2 = [
            'name' => 'Carl',
            'surname' => 'Cars',
            'email' => 'carsonCarl@mail.ru',
            'position_id' => $position2->id,
            'age' => '25',
            'description' => 'asdasdsaadasdsa',
            'is_married' => 'true'
        ];

        $workerData3 = [
            'name' => 'Jannet',
            'surname' => 'Shluxa',
            'email' => 'savaka@mail.ru',
            'position_id' => $position1->id,
            'age' => '43',
            'description' => 'blyad',
            'is_married' => 'true'
        ];

        $workerData4 = [
            'name' => 'Korova',
            'surname' => 'Bekon',
            'email' => 'bek@mail.ru',
            'position_id' => $position3->id,
            'age' => '22',
            'description' => 'abyrvalg',
            'is_married' => 'false'
        ];

        $workerData5 = [
            'name' => 'Chervyak',
            'surname' => 'isTashli',
            'email' => 'spir@mail.ru',
            'position_id' => $position3->id,
            'age' => '24',
            'description' => 'V tashlu',
            'is_married' => 'false'
        ];

        $workerData6 = [
            'name' => 'Gus',
            'surname' => 'Tupicki',
            'email' => 'ashash@mail.ru',
            'position_id' => $position1->id,
            'age' => '35',
            'description' => 'slabenko!',
            'is_married' => 'false'
        ];

        $worker1 = Worker::create($workerData1);
        $worker2 = Worker::create($workerData2);
        $worker3 = Worker::create($workerData3);
        $worker4 = Worker::create($workerData4);
        $worker5 = Worker::create($workerData5);
        $worker6 = Worker::create($workerData6);

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

        $profileData4 = [
            'worker_id' => $worker4->id,
            'skill' => 'nit',
            'city' => 'Moscow',
            'experience' => '22',
            'finished_study_at' => '2015-07-28'
        ];

        $profileData5 = [
            'worker_id' => $worker5->id,
            'skill' => 'kopat',
            'city' => 'tashla',
            'experience' => '22',
            'finished_study_at' => '2022-07-28'
        ];

        $profileData6 = [
            'worker_id' => $worker6->id,
            'skill' => 'pit',
            'city' => 'piter',
            'experience' => '32',
            'finished_study_at' => '2012-07-28'
        ];

        Profile::create($profileData1);
        Profile::create($profileData2);
        Profile::create($profileData3);
        Profile::create($profileData4);
        Profile::create($profileData5);
        Profile::create($profileData6);

    }

    private function prepareManyToMany()
    {
        $workerManager = Worker::find(2);
        $workerBackend = Worker::find(1);
        $workerDesigner1 = Worker::find(5);
        $workerDesigner2 = Worker::find(6);
        $workerFrontend1 = Worker::find(4);
        $workerFrontend2 = Worker::find(3);

        $project1 = Project::create([
            'title' => 'Shop'
        ]);

        $project2 = Project::create([
            'title' => 'Blog'
        ]);

        ProjectWorker::create([
            'project_id' => $project1->id,
            'worker_id' => $workerManager->id,
        ]);
        ProjectWorker::create([
            'project_id' => $project1->id,
            'worker_id' => $workerBackend->id,
        ]);
        ProjectWorker::create([
            'project_id' => $project1->id,
            'worker_id' => $workerDesigner1->id,
        ]);
        ProjectWorker::create([
            'project_id' => $project1->id,
            'worker_id' => $workerFrontend1->id,
        ]);

        ProjectWorker::create([
            'project_id' => $project2->id,
            'worker_id' => $workerManager->id,
        ]);
        ProjectWorker::create([
            'project_id' => $project2->id,
            'worker_id' => $workerBackend->id,
        ]);
        ProjectWorker::create([
            'project_id' => $project2->id,
            'worker_id' => $workerDesigner2->id,
        ]);
        ProjectWorker::create([
            'project_id' => $project2->id,
            'worker_id' => $workerFrontend2->id,
        ]);
    }
}
