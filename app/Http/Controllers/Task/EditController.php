<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Services\Task\TaskService;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    public function __invoke(Task $task)
    {
        $priorities = TaskService::getPriorities();
        return view('task.edit', compact('task', 'priorities'));
    }
}
