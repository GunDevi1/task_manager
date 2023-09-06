<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $tasks = Task::where('is_done', 0)
            ->orderBy('priority', 'desc')
            ->where('user_id', auth()->user()->id)
            ->get();

        return view('task.index', compact('tasks'));
    }
}
