<?php

namespace App\Http\Controllers\Done;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $done_tasks = Task::all()
            ->where('is_done', 1)
            ->where('user_id', auth()->user()->id);;

        return view('done.index', compact('done_tasks'));
    }
}
