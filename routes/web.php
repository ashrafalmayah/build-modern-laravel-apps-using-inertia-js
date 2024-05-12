<?php

use App\Http\Controllers\Auth\LoginController;
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

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy']);

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return inertia('Home');
    });

    Route::get('/users', function () {
        return inertia('Users/Index', [
            "users" => User::query()
                ->where('name', 'like', '%' . request('search') . '%')
                ->paginate()
                ->withQueryString()
                ->through(fn($user) => ['id' => $user->id, 'name' => $user->name, 'email' => $user->email]),
            "filters" => request()->only(['search'])
        ]);
    });

    Route::get('/users/create', function () {
        return inertia('Users/Create');
    });

    Route::post('/users', function () {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => ['required', 'min:4', 'max:15']
        ]);

        User::create($attributes);

        return redirect('/users');
    });

    Route::get('/settings', function () {
        return inertia('Settings');
    });
});
