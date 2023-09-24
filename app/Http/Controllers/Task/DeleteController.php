<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Task $task)
    {
        $task->delete();

        return response([]);
    }
}
