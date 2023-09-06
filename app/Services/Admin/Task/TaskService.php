<?php

namespace App\Services\Admin\Task;

class TaskService
{
    public static function getPriorities() {
        return [
            '1' => 'Елементарно',
            '2' => 'Легко',
            '3' => 'Средне',
            '4' => 'Тяжело',
        ];
    }
}
