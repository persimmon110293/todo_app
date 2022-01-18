<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->page;
        return Task::offset(($page - 1) * 10)
                    ->limit(10)
                    ->orderBy('id')
                    ->get();
    }

    public function show(Task $task)
    {
        return $task;
    }

    public function store(Request $request)
    {
        return Task::create($request->all());
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());

        return $task;
    }

    public function delete(Task $task)
    {
        $task->delete();

        return $task;
    }
}
