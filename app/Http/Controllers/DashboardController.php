<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function show()
    {
        return Inertia::render('Dashboard', [
            'tasks' => Task::orderBy('due', 'desc')->get(['id', 'due', 'user', 'site', 'name', 'progress', 'words', 'type']),
            'users' => User::get(['id', 'name']),
            'projects' => Project::get(),
        ]);
    }
}