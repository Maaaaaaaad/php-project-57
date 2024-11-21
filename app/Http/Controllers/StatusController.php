<?php

namespace App\Http\Controllers;

use App\Models\Statuses;
use App\Models\Task;
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
        $request->validate([
            'name' => 'required|unique:statuses',
        ]);

        $status = new Statuses();
        $status->fill($request->all());
        $status->save();

        flash('Статус успешно создан', 'success');

        return redirect()->route('statuses');
    }
    public function show(Statuses $status)
    {
        return view('statuses/show-status', compact('status'));
    }
    public function edit($id)
    {
        $status = Statuses::findOrFail($id);
        return view('statuses/edit-status', compact('status'));
    }
    public function update(Request $request, $id)
    {
        $status = Statuses::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|unique:statuses'
        ]);

        $status->fill($request->all());
        $status->save();

        flash('Статус успешно изменён', 'success');
        return redirect()->route('statuses');
    }
    public function destroy($id)
    {
        $tasks = Task::where('status_id', $id)->exists();
        $status = Statuses::find($id);

        if (!$tasks) {
                flash('Статус успешно удалён', 'success');
                $status->delete();
                return redirect()->route('statuses');
        }

        flash('Не удалось удалить статус', 'danger');
        return redirect()->route('statuses');
    }
}
