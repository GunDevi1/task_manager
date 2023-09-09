<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Task;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Report $report)
    {
        $report->delete();

        return redirect()->route('admin.report.index');
    }
}
