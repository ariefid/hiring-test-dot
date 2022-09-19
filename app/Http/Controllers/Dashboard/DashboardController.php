<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\TodoState;
use App\Http\Controllers\Controller;
use App\Models\Todo;

class DashboardController extends Controller
{
    /**
     * Display a view of dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
    {
        $title = 'Dashboard';
        $todos = Todo::query()->whereIsPrivate(false)->whereState(TodoState::PUBLISH)->cursorPaginate();

        return response()->view('dashboard.dashboard', compact('title', 'todos'));
    }
}
