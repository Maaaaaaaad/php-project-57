<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    public function index(Request $request)
    {
        $statuses = Status::all();
        $tasks = Task::paginate(15);
        $users = User::all();



        return view('tasks/show-tasks', compact('tasks', 'statuses', 'users'));
    }

    public function create()
    {
        $task = new Task();
        $statuses = Status::all();
        $users = User::all();

        return view('tasks/edit-task', compact('task', 'statuses', 'users'));
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $task = Task::find($id)->toArray();
        $status = Status::find($task['statuses_id'])->pluck('name')->all();

        return view('tasks/show-task', compact('task', 'status'));
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
