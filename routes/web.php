<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/
Route::get('/', [ArticleController::class, 'publicIndex']);
Route::get('/artikel/{id}', [ArticleController::class, 'show']);

/*
|--------------------------------------------------------------------------
| ADMIN LOGIN
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', function () {
    return view('admin.login');
});

Route::post('/admin/login', function (Request $request) {
    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        if (auth()->user()->role === 'admin') {
            return redirect('/admin/articles');
        } else {
            Auth::logout();
            return back()->with('error', 'Bukan admin!');
        }
    }

    return back()->with('error', 'Login gagal!');
});

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/admin/login');
});

/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/
Route::middleware(['admin'])->group(function () {
    Route::resource('/admin/articles', ArticleController::class);
});