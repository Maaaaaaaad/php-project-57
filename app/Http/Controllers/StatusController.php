<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Models\Status;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $input = $request->input('q');

        $status = DB::table('statuses')->get();

        return view('statuses/show-status', compact('status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = new Status();
        return view('statuses/create-status', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:statuses',
        ]);

        $status = new Status();
        $status->fill($request->all());
        $status->save();



        return redirect()->route('task.statuses');
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        $newStatus = new StatusController();
        return view('statuses/show-status', compact('status', 'newStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatusRequest $request, Status $status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        //
    }
}
