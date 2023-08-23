<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $countTasks = Task::all()->count();
        $countUsers = User::all()->count();

        return view('admin.main.index', compact('countUsers', 'countTasks'));
    }
}
