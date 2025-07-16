<?php

namespace App\Console\Commands;

use App\Models\Avatar;
use App\Models\Client;
use App\Models\Department;
use App\Models\Position;
use App\Models\Project;
use App\Models\Review;
use App\Models\Tag;
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
        Worker::find(1)->update([
            'name' => 'devyanosta rebyat'
        ]);
    }

    // Создание данных "в рукопашку"

//    private function prepareData()
//    {
//        Client::create([
//            'name' => 'Bob'
//        ]);
//        Client::create([
//            'name' => 'Goose'
//        ]);
//        Client::create([
//            'name' => 'Korova'
//        ]);
//
//        $department1 = Department::create([
//            'title' => 'It'
//        ]);
//        $department2 = Department::create([
//            'title' => 'Analytics'
//        ]);
//
//        $position1 = Position::create([
//            'title' => 'Developer',
//            'department_id' => $department1->id
//        ]);
//
//        $position2 = Position::create([
//            'title' => 'Manager',
//            'department_id' => $department2->id
//        ]);
//
//        $position3 = Position::create([
//            'title' => 'Designer',
//            'department_id' => $department2->id
//        ]);
//
//        $workerData1 = [
//            'name' => 'Ivan',
//            'surname' => 'Ivanov',
//            'email' => 'ivanov@mail.ru',
//            'position_id' => $position1->id,
//            'age' => '32',
//            'description' => 'asdasdsa',
//            'is_married' => 'false'
//        ];
//
//        $workerData2 = [
//            'name' => 'Carl',
//            'surname' => 'Cars',
//            'email' => 'carsonCarl@mail.ru',
//            'position_id' => $position2->id,
//            'age' => '25',
//            'description' => 'asdasdsaadasdsa',
//            'is_married' => 'true'
//        ];
//
//        $workerData3 = [
//            'name' => 'Jannet',
//            'surname' => 'Shluxa',
//            'email' => 'savaka@mail.ru',
//            'position_id' => $position1->id,
//            'age' => '43',
//            'description' => 'blyad',
//            'is_married' => 'true'
//        ];
//
//        $workerData4 = [
//            'name' => 'Korova',
//            'surname' => 'Bekon',
//            'email' => 'bek@mail.ru',
//            'position_id' => $position3->id,
//            'age' => '22',
//            'description' => 'abyrvalg',
//            'is_married' => 'false'
//        ];
//
//        $workerData5 = [
//            'name' => 'Chervyak',
//            'surname' => 'isTashli',
//            'email' => 'spir@mail.ru',
//            'position_id' => $position3->id,
//            'age' => '24',
//            'description' => 'V tashlu',
//            'is_married' => 'false'
//        ];
//
//        $workerData6 = [
//            'name' => 'Gus',
//            'surname' => 'Tupicki',
//            'email' => 'ashash@mail.ru',
//            'position_id' => $position1->id,
//            'age' => '35',
//            'description' => 'slabenko!',
//            'is_married' => 'false'
//        ];
//
//        $worker1 = Worker::create($workerData1);
//        $worker2 = Worker::create($workerData2);
//        $worker3 = Worker::create($workerData3);
//        $worker4 = Worker::create($workerData4);
//        $worker5 = Worker::create($workerData5);
//        $worker6 = Worker::create($workerData6);
//
//        $profileData1 = [
//            'skill' => 'Coder',
//            'city' => 'Tokio',
//            'experience' => '5',
//            'finished_study_at' => '2020-07-01'
//        ];
//
//        $profileData2 = [
//            'skill' => 'Boss',
//            'city' => 'RioDejanero',
//            'experience' => '10',
//            'finished_study_at' => '2014-07-28'
//        ];
//
//        $profileData3 = [
//            'skill' => 'Blyat',
//            'city' => 'Moscow',
//            'experience' => '40',
//            'finished_study_at' => '2001-07-28'
//        ];
//
//        $profileData4 = [
//            'skill' => 'nit',
//            'city' => 'Moscow',
//            'experience' => '22',
//            'finished_study_at' => '2015-07-28'
//        ];
//
//        $profileData5 = [
//            'skill' => 'kopat',
//            'city' => 'tashla',
//            'experience' => '22',
//            'finished_study_at' => '2022-07-28'
//        ];
//
//        $profileData6 = [
//            'skill' => 'pit',
//            'city' => 'piter',
//            'experience' => '32',
//            'finished_study_at' => '2012-07-28'
//        ];
//
//        $worker1->profile()->create($profileData1);
//        $worker2->profile()->create($profileData2);
//        $worker3->profile()->create($profileData3);
//        $worker4->profile()->create($profileData4);
//        $worker5->profile()->create($profileData5);
//        $worker6->profile()->create($profileData6);
//
//    }
//
//    private function prepareManyToMany()
//    {
//        $workerManager = Worker::find(2);
//        $workerBackend = Worker::find(1);
//        $workerDesigner1 = Worker::find(5);
//        $workerDesigner2 = Worker::find(6);
//        $workerFrontend1 = Worker::find(4);
//        $workerFrontend2 = Worker::find(3);
//
//        $project1 = Project::create([
//            'title' => 'Shop'
//        ]);
//
//        $project2 = Project::create([
//            'title' => 'Blog'
//        ]);
//
//        $project1->workers()->attach([
//            $workerManager->id,
//            $workerBackend->id,
//            $workerDesigner1->id,
//            $workerFrontend1->id
//        ]);
//        $project2->workers()->attach([
//            $workerManager->id,
//            $workerBackend->id,
//            $workerDesigner2->id,
//            $workerFrontend2->id
//        ]);
//    }
}
