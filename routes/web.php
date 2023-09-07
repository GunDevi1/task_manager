<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', IndexController::class)->name('main.index');
});

Route::group(['namespace' => 'App\Http\Controllers\Task', 'prefix' => 'tasks', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', IndexController::class)->name('task.index');
    Route::get('/new_task', CreateController::class)->name('task.create');
    Route::post('/', StoreController::class)->name('task.store');
    Route::get('/task-{task}/edit', EditController::class)->name('task.edit');
    Route::patch('/{task}', UpdateController::class)->name('task.update');
    Route::patch('/{task}/attribute', AttributeController::class)->name('task.attribute');
    Route::delete('/{task}', DeleteController::class)->name('task.destroy');
});

Route::group(['namespace' => 'App\Http\Controllers\Done', 'prefix' => 'done', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', IndexController::class)->name('done.index');
    Route::patch('/{done}/attribute', AttributeController::class)->name('done.attribute');
    Route::delete('/{done}', DeleteController::class)->name('done.destroy');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth','verified', 'admin']], function () {
    Route::get('/', IndexController::class)->name('admin.index');

    Route::group(['namespace' => 'Task', 'prefix' => 'tasks'], function () {
        Route::get('/', IndexController::class)->name('admin.task.index');
        Route::get('/new_task', CreateController::class)->name('admin.task.create');
        Route::post('/', StoreController::class)->name('admin.task.store');
        Route::get('/task-{task}', ShowController::class)->name('admin.task.show');
        Route::get('/task-{task}/edit', EditController::class)->name('admin.task.edit');
        Route::patch('/task-{task}', UpdateController::class)->name('admin.task.update');
        Route::delete('/task-{task}', DeleteController::class)->name('admin.task.destroy');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', IndexController::class)->name('admin.user.index');
        Route::get('/new_user', CreateController::class)->name('admin.user.create');
        Route::post('/', StoreController::class)->name('admin.user.store');
        Route::get('/user-{user}', ShowController::class)->name('admin.user.show');
        Route::get('/user-{user}/edit', EditController::class)->name('admin.user.edit');
        Route::patch('/user-{user}', UpdateController::class)->name('admin.user.update');
        Route::delete('/user-{user}', DeleteController::class)->name('admin.user.destroy');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Auth', 'prefix' => 'auth/google'], function () {
    Route::get('/', RedirectToGoogleController::class)->name('google.login');
    Route::get('/callback', HandleGoogleCallbackController::class)->name('google.callback');
});

Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
