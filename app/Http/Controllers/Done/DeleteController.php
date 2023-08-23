<?php

namespace App\Http\Controllers\Done;

use App\Http\Controllers\Controller;
use App\Models\Done;

class DeleteController extends Controller
{
    public function __invoke(Done $done)
    {
        $done->delete();

        return redirect()->route('done.index');
    }
}
