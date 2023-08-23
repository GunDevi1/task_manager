<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\UpdateAttributeRequest;
use App\Models\Task;

class AttributeController extends Controller
{
    public function __invoke(UpdateAttributeRequest $request, Task $task)
    {
        $data = $request->validated();
        $data['is_done'] = 1;

        $task->update($data);

        return redirect()->route('done.index');
    }
}
