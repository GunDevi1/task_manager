<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\StoreRequest;
use App\Models\Report;
use App\Models\Task;
use Illuminate\Http\Request;

class SendReportController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Report::create($data);

        $request->session()->flash('success', 'Сообшение было успешно отправлено.');

        return redirect()->route('main.contacts');
    }
}
