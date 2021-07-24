<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::resource('/user', 'App\Http\Controllers\UserController')->middleware('auth');
Route::resource('/task', 'App\Http\Controllers\TaskController')
    ->names([
        'index' => 'task.index',
        'create' => 'task.create',
        'edit' => 'task.edit',
        'update' => 'task.update',
        'destroy' => 'task.destroy',
        'store' => 'task.store'
    ])
    ->middleware(['auth']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
