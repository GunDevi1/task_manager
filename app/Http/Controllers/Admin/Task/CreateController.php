<?php

namespace App\Http\Controllers\Admin\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use App\Services\Admin\Task\TaskService;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $priorities = TaskService::getPriorities();
        $users = User::all();
        return view('admin.task.create', compact('users', 'priorities'));
    }
}
