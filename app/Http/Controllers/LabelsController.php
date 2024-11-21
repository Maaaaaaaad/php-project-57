<?php

namespace App\Http\Controllers;

use App\Models\TaskLabels;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LabelsController extends Controller
{
    public function index()
    {
        $labels = TaskLabels::all();
        return view('labels/show-labels', compact('labels'));
    }

    public function create()
    {
        $label = new TaskLabels();
        return view('labels/create-label', compact('label'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:labels',
        ]);

        $label = new TaskLabels();
        $label->fill($request->all());
        $label->save();

        flash('Метка успешно создана', 'success');

        return redirect()->route('labels');
    }
    public function edit($id)
    {
        $label = TaskLabels::findOrFail($id);


        return view('labels/edit-label', compact('label'));
    }
    public function update(Request $request, $id)
    {
        $label = TaskLabels::findOrFail($id);

        $data =  $request->validate([
            'name' => 'required|unique:task_labels',
        ]);

        $label->fill($data);
        $label->save();

        flash('Метка успешно изменена', 'success');

        return redirect()->route('labels');
    }
    public function destroy($id)
    {
        $label = TaskLabels::find($id);

        if (!$label->tasks()->exists()) {
            $label->delete();
            flash('Метка успешно удалена', 'success');
            return redirect()->route('labels');
        }

        flash('Не удалось удалить метку', 'danger');
        return redirect()->route('labels');
    }
}
