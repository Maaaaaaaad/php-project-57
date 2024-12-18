<?php

namespace App\Http\Controllers;

use App\Models\Labels;
use App\Models\Task;
use App\Models\Statuses;
use App\Models\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Collection;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class TasksController extends Controller
{
    public function index(Request $request)
    {
        $defaultFilter = [
            "status_id" => '',
            "created_by_id" => '',
            "assigned_to_id" => ''
        ];

        $input = $request->query('filter') ?? $defaultFilter;



        $tasks = QueryBuilder::for(Task::class)
            ->allowedFilters([
                AllowedFilter::exact('status_id'),
                AllowedFilter::exact('created_by_id'),
                AllowedFilter::exact('assigned_to_id'),
            ])
            ->paginate(15);

        $statuses = Statuses::all();
        $users = User::all();
        $userId = $request->user()->id ?? '';

        return view('tasks/show-tasks', compact('statuses', 'users', 'userId', 'tasks', 'input'));
    }

    public function create()
    {
        $task = new Task();
        $statuses = Statuses::all();
        $users = User::all();
        $labels = Labels::all();

        return view('tasks/create-task', compact('task', 'statuses', 'users', 'labels'));
    }


    public function store(Request $request)
    {
        $id = auth()->user()->getAuthIdentifier();

        $request->merge(['created_by_id' => $id]);

        $data = $request->validate([
            'name' => 'required|unique:tasks',
            'status_id' => 'required',
            'created_by_id' => 'required',
            'assigned_to_id' => 'required',
            'description' => ''
        ]);

        $task = new Task();
        $task->fill($data);
        $task->save();

        $task->labels()->attach($request->labels);

        flash(__('messages.taskWasCreated'), 'success');
        return redirect()->route('tasks.index');
    }
    public function show(string $id)
    {
        $task = Task::findOrFail($id);
        $status = $task->gatStatusesName();
        $labels = $task->getLabels();


        return view('tasks/show-task', compact('task', 'status', 'labels'));
    }


    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        $statuses = Statuses::all();
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
            'description' => ''
        ]);

        $task->fill($data);
        $task->save();

        $task->labels()->sync($request->labels);

        flash(__('messages.taskWasUpdated'), 'success');
        return redirect()->route('tasks.index');
    }


    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->labels()->detach();
        $task->delete();

        flash(__('messages.taskWasDeleted'), 'success');
        return redirect()->route('tasks.index');
    }
}
