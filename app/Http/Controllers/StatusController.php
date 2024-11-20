<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        return view('statuses/show-status', compact('statuses'));
    }

    public function create()
    {
        $status = new Status();
        return view('statuses/create-status', compact('status'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:statuses',
        ]);

        $status = new Status();
        $status->fill($request->all());
        $status->save();

        flash('Статус успешно создан', 'success');

        return redirect()->route('statuses');
    }
    public function show(Status $status)
    {
        return view('statuses/show-status', compact('status'));
    }
    public function edit($id)
    {
        $status = Status::findOrFail($id);
        return view('statuses/edit-status', compact('status'));
    }
    public function update(Request $request, $id)
    {
        $status = Status::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|unique:statuses'
        ]);

        $status->fill($data);
        $status->save();

        flash('Статус успешно изменён', 'success');
        return redirect()->route('statuses');
    }
    public function destroy($id)
    {
        $tasks = Task::where('status_id', $id)->exists();
        $status = Status::find($id);

        if (!$tasks) {
                $status->delete();
                flash('Статус успешно удалён', 'success');
                return redirect()->route('statuses');
        }

        flash('Не удалось удалить статус', 'danger');
        return redirect()->route('statuses');
    }
}
