<?php

use App\Models\User;
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

Route::get('/', function () {
    return inertia('Home');
});

Route::get('/users', function () {
    return inertia('Users', [
        "users" => User::query()
            ->where('name', 'like', '%' . request('search') . '%')
            ->paginate()
            ->withQueryString()
            ->through(fn($user) => ['id' => $user->id, 'name' => $user->name, 'email' => $user->email]),
        "filters" => request()->only(['search'])
    ]);
});

Route::get('/settings', function () {
    return inertia('Settings');
});

Route::post('/logout', function () {
    dd(request('foo'));
});
