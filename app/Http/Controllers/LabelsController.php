<?php

namespace App\Http\Controllers;

use App\Models\Labels;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LabelsController extends Controller
{
    public function index()
    {
        $labels = Labels::all();
        return view('labels/show-labels', compact('labels'));
    }

    public function create()
    {
        $label = new Labels();
        return view('labels/create-label', compact('label'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:labels',
        ]);

        $label = new Labels();
        $label->fill($request->all());
        $label->save();

        flash('Метка успешно создана', 'success');

        return redirect()->route('labels');
    }
    public function edit($id)
    {
        $label = Labels::findOrFail($id);


        return view('labels/edit-label', compact('label'));
    }
    public function update(Request $request, $id)
    {
        $label = Labels::findOrFail($id);

        $data =  $request->validate([
            'name' => 'required|unique:labels',
            'description' => ''
        ]);

        $label->fill($data);
        $label->save();

        flash('Метка успешно изменена', 'success');

        return redirect()->route('labels');
    }
    public function destroy($id)
    {
        $label = Labels::find($id);

        if (!$label->tasks()->exists()) {
            flash('Метка успешно удалена', 'alert');
            $label->delete();
            return redirect()->route('labels');
        }

        flash('Не удалось удалить метку', 'danger');
        return redirect()->route('labels');
    }
}
