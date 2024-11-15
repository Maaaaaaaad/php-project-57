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
        $tasks = Task::all();
        $users = User::all();

        $task = Task::all()->toArray();

/*       foreach ($task as $item)
       {
           $statusName = Status::find($item['statuses_id'])->name;

       }*/




        return view('tasks/show-tasks', compact('tasks', 'statuses', 'users'));
    }

    public function create()
    {
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
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
