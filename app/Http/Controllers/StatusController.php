<?php

namespace App\Http\Controllers;

use App\Models\Statuses;
use App\Models\Task;
use http\Exception;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Statuses::all();
        return view('statuses/show-status', compact('statuses'));
    }

    public function create()
    {
        $status = new Statuses();
        return view('statuses/create-status', compact('status'));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
            'name' => 'required|unique:statuses',
            ],
            [
                'unique' => 'Статус с таким именем уже существует'
            ]
        );

        $status = new Statuses();
        $status->fill($request->all());
        $status->save();

        flash(__('messages.statusWasCreated'), 'success');
        return redirect()->route('statuses.index');
    }
    public function show(Statuses $status)
    {
        return view('statuses/show-status', compact('status'));
    }
    public function edit(string $id)
    {
        $status = Statuses::findOrFail($id);
        return view('statuses/edit-status', compact('status'));
    }
    public function update(Request $request, string $id)
    {
        $status = Statuses::findOrFail($id);
        $data = $request->validate(
            [
            'name' => 'required|unique:statuses'
            ],
            [
                'unique' => 'Статус с таким именем уже существует'
            ]
        );

        $status->fill($request->all());
        $status->save();

        flash(__('messages.statusWasUpdated'), 'success');
        return redirect()->route('statuses.index');
    }
    public function destroy(string $id)
    {
        $tasks = Task::where('status_id', $id)->exists();
        $status = Statuses::find($id);

        if (!$tasks) {
                flash(__('messages.statusWasDeleted'), 'danger');
                $status->delete();
                return redirect()->route('statuses.index');
        }

        flash(__('messages.statusWasNotDeleted'), 'success');
        return redirect()->route('statuses.index');
    }
}
