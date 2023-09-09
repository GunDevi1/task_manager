<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('main.index');
    }

    public function more()
    {
        return view('main.more');
    }

    public function about()
    {
        return view('main.about');
    }

    public function contacts()
    {
        return view('main.contacts');
    }

    public function policy()
    {
        return view('main.policy');
    }
}
