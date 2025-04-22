<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::all();
        return view('worker.index', compact('workers'));
    }

    public function show(Worker $worker)
    {
        return view('worker.show', compact('worker'));
    }

    public function create()
    {
        $worker = [
            'name' => 'Mark',
            'surname' => 'Markov',
            'email' => 'user2@mail.ru',
            'age' => '21',
            'description' => 'just Mark',
            'is_married' => 'false'
        ];

        Worker::create($worker);

        return 'Worker was created';
    }

    public function update()
    {
        $worker = Worker::find(2);
        $worker->update([
            'name' => 'Golubaya Luna',

        ]);
        return $worker->name . 'was updated';
    }

    public function delete()
    {
        $worker = Worker::find(2);
        $worker->delete();
        return 'deleted';
    }
}
