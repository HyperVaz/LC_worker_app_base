<?php

namespace App\Http\Controllers;

use App\Http\Filter\Var1\WorkerFilter;
use App\Http\Requests\Worker\IndexRequest;
use App\Http\Requests\Worker\StoreRequest;
use App\Http\Requests\Worker\UpdateRequest;
use App\Models\Worker;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();

        $filter = new WorkerFilter($data);
        $workerQuery = Worker::filter($filter);

        $workers = $workerQuery->paginate(12);

        return view('worker.index', compact('workers'));
    }

    public function show(Worker $worker)
    {
        return view('worker.show', compact('worker'));
    }

    public function edit(Worker $worker){
        $this->authorize('create', $worker);
        return view('worker.edit', compact('worker'));
    }

    /**
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Worker::class);
        return view('worker.create');
    }

    public function store(StoreRequest $request){
        $this->authorize('create', Worker::class);
        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);
        Worker::create($data);

        return redirect()->route('workers.index');
    }

    public function update(UpdateRequest $request, Worker $worker)
    {
        $this->authorize('create', $worker);
        $data = $request->validated();
        $data['is_married'] = isset($data['is_married']);
        $worker->update($data);
        return redirect()->route('workers.show', $worker->id);
    }

    public function destroy(Worker $worker)
    {
        $this->authorize('delete', $worker);
        $worker->delete();
        return redirect()->route('workers.index');
    }
}
