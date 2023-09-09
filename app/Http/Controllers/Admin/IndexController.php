<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Task;
use App\Models\User;
use Google\Service\CloudSourceRepositories\Repo;

class IndexController extends Controller
{
    public function __invoke()
    {
        $countTasks = Task::all()->count();
        $countUsers = User::all()->count();
        $countReports = Report::all()->count();

        return view('admin.main.index', compact('countUsers', 'countTasks', 'countReports'));
    }
}
