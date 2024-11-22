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
        $request->validate(
            [
            'name' => 'required|unique:labels',
            ],
            [
                'unique' => 'Метка с таким именем уже существует'
            ]
        );


        $label = new Labels();
        $label->fill($request->all());
        $label->save();

        flash(__('messages.labelWasCreated'), 'success');

        return redirect()->route('labels.index');
    }
    public function edit(string $id)
    {
        $label = Labels::findOrFail($id);


        return view('labels/edit-label', compact('label'));
    }
    public function update(Request $request, string $id)
    {
        $label = Labels::findOrFail($id);

        $data =  $request->validate(
            [
            'name' => 'required|unique:labels',
            'description' => ''
            ],
            [
                'unique' => 'Метка с таким именем уже существует'
            ]
        );

        $label->fill($data);
        $label->save();

        flash(__('messages.labelWasUpdated'), 'success');
        return redirect()->route('labels.index');
    }
    public function destroy(string $id)
    {
        $label = Labels::find($id);

        if (!$label->tasks()->exists()) {
            flash(__('messages.labelWasDeleted'), 'danger');
            $label->delete();
            return redirect()->route('labels.index');
        }

        flash(__('messages.labelWasNotDeleted'), 'success');
        return redirect()->route('labels.index');
    }
}
