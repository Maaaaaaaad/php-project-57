<?php

namespace App\Http\Controllers;

use App\Models\Labels;
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
        $userId = $request->user()->id ?? '';


        return view('tasks/show-tasks', compact('tasks', 'statuses', 'users', 'userId'));
    }

    public function create()
    {
        $task = new Task();
        $statuses = Status::all();
        $users = User::all();
        $labels = Labels::all();

        return view('tasks/create-task', compact('task', 'statuses', 'users', 'labels'));
    }


    public function store(Request $request)
    {
        $id = auth()->user()->getAuthIdentifier();

        $request->merge(['created_by_id' => $id]);

        $request->validate([
            'name' => 'required|unique:tasks',
            'status_id' => 'required',
            'created_by_id' => 'required',
        ]);

        $task = new Task();
        $task->fill($request->all());
        $task->save();

        if ($request->labels) {
            foreach ($request->labels as $key => $label) {
                $task->labels()->attach($label);
            }
        }

        flash('Задача успешно создана', 'success');

        return redirect()->route('tasks');
    }


    public function show($id)
    {
        $task = Task::find($id);
        $status = Status::find($task['status_id'])->pluck('name')->all();
        $labels = $task->labels->toArray();

        return view('tasks/show-task', compact('task', 'status', 'labels'));
    }


    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        $statuses = Status::all();
        $users = User::all();
        $labels = Labels::all();
        $taskLabels = $task->labels;

        $notTurnLabels = $labels->diff($taskLabels);


        return view('tasks/edit-task', compact('task', 'statuses', 'users', 'taskLabels', 'notTurnLabels'));
    }


    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);

        $data =  $request->validate([
            'name' => 'required',
            'status_id' => 'required',
            'assigned_to_id' => 'required',
        ]);

        $task->labels()->sync($request->labels);


        $task->fill($data);
        $task->save();

        flash('Задача успешно изменена', 'success');

        return redirect()->route('tasks');
    }


    public function destroy(string $id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->labels()->detach();
            $task->delete();
        }

        flash('Задача успешно удалена', 'success');
        return redirect()->route('tasks');
    }
}
