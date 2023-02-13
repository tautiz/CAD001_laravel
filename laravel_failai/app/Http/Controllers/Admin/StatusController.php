<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StatusRequest;
use App\Models\Status;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        return view('status.index', compact('statuses'));
    }

    public function store(StatusRequest $request)
    {
        $status = Status::create($request->all());
        return redirect()->route('statuses.show', $status);
    }

    public function create()
    {
        return view('status.create');
    }

    public function show(Status $status)
    {
        return view('status.show', compact('status'));
    }

    public function edit(Status $status)
    {
        return view('status.edit', compact('status'));
    }

    public function update(StatusRequest $request, Status $status)
    {
        $status->update($request->all());
        return redirect()->route('statuses.show', $status);
    }

    public function destroy(Status $status)
    {
        $status->delete();
        return redirect()->route('statuses.index');
    }
}
