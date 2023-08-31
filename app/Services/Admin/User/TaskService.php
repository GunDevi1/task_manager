<?php

namespace App\Services\Admin\User;

use App\Mail\User\SendPassword;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class TaskService
{
    public function store($data)
    {
        $password = Str::random(10);
        $data['password'] = Hash::make($password);
        $user = User::firstOrCreate(['email' => $data['email']], $data);
        Mail::to($data['email'])->send(new SendPassword($password));
        event(new Registered($user));
    }
}
