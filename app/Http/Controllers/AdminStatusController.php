<?php

namespace App\Http\Controllers;

use App\Models\HistoryStatus;
use Illuminate\Http\Request;

class AdminStatusController extends Controller
{
    public function index()
    {
        $this->check_permission("admin.status.index");


        return view('admin.status.index');
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(HistoryStatus $historyStatus)
    {
    }

    public function edit(HistoryStatus $historyStatus)
    {
    }

    public function update(Request $request, HistoryStatus $historyStatus)
    {
    }

    public function destroy(HistoryStatus $historyStatus)
    {
    }
}
