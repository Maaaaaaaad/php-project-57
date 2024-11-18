<?php

namespace App\Http\Controllers;

use App\Models\Labels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LabelsController extends Controller
{
    public function index()
    {
        $labels = DB::table('labels')->get();
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

        $status = new Labels();
        $status->fill($request->all());
        $status->save();

        flash('Метка успешно создана', 'success');

        return redirect()->route('labels');
    }
    public function show()
    {
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
        ]);

        $label->fill($data);
        $label->save();

        flash('Метка успешно изменена', 'success');

        return redirect()->route('labels');
    }
    public function destroy($id)
    {
        $lable = Labels::find($id);
        if ($task) {
            $task->delete();
        }

        flash('Метка успешно удалена', 'success');
        return redirect()->route('tasks');
    }
}
