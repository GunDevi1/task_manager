<?php

namespace App\Http\Controllers\Done;

use App\Http\Controllers\Controller;
use App\Http\Requests\Done\UpdateAttributeRequest;
use App\Models\Done;

class AttributeController extends Controller
{
    public function __invoke(UpdateAttributeRequest $request, Done $done)
    {
        $data = $request->validated();
        $data['is_done'] = 0;

        $done->update($data);

        return redirect()->route('task.index');
    }
}
