<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\User\SendPassword;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class HandleGoogleCallbackController extends Controller
{
    public function __invoke()
    {
        $password = Str::random(10);

        try {
            $user = Socialite::driver('google')->user();

            $is_user = User::where('email', $user->getEmail())->first();

            if (!$is_user) {
                $saveUser = User::updateOrCreate(
                    [
                        'google_id' => $user->getId(),
                    ],
                    [
                        'name' => $user->getName(),
                        'email' => $user->getEmail(),
                        'password' => Hash::make($password),
                        Mail::to($user->getEmail())->send(new SendPassword($password)),
                    ]
                );
            } else {
                $saveUser = User::where('email', $user->getEmail())->update([
                    'google_id' => $user->getId(),
                ]);
                $saveUser = User::where('email',$user->getEmail())->first();
            }

            Auth::loginUsingId($saveUser->id);

            return redirect()->route('task.index');

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
