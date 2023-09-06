<?php

namespace App\Http\Controllers\Task;

use App\Services\Task\TaskService;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $priorities = TaskService::getPriorities();
        return view('task.create', compact('priorities'));
    }
}
