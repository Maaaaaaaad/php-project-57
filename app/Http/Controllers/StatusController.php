<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    public function index(Request $request)
    {
        $input = $request->input('q');

        $statuses = DB::table('statuses')->get();

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

        return redirect()->route('statuses');
    }
    public function show(Status $status)
    {
        $newStatus = new StatusController();
        return view('statuses/show-status', compact('status', 'newStatus'));
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

        return redirect()->route('statuses');
    }
    public function destroy($id)
    {
        $status = Status::find($id);
        if ($status) {
            $status->delete();
        }
        return redirect()->route('statuses');
    }
}
