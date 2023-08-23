<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $tasks = Task::all()
            ->where('is_done', 0)
            ->where('user_id', auth()->user()->id);

        return view('task.index', compact('tasks'));
    }
}
