<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Task;

class IndexController extends Controller
{
    public function __invoke()
    {
        $reports = Report::all();

        return view('admin.report.index', compact('reports'));
    }
}

