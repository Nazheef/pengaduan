<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ComplaintController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function () {

    if (Auth::check()) {
        return redirect(Auth::user()->role == 'admin' ? '/admin' : '/dashboard');
    }

    return view('auth.login');

})->name('login')->middleware('guest');

Route::post('/login', function (Request $request) {

    $credentials = $request->validate([
        'username' => ['required'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        if (Auth::user()->role == 'admin') {
            return redirect('/admin');
        }

        return redirect('/dashboard');
    }

    return back()->withErrors([
        'username' => 'Login gagal',
    ]);

});

Route::get('/dashboard', [ComplaintController::class, 'index'])->middleware('auth');

Route::get('/admin', [ComplaintController::class, 'admin'])->middleware('auth');

Route::post('/complaint', [ComplaintController::class, 'store'])->middleware('auth');

Route::post('/status/{id}', [ComplaintController::class, 'status'])->middleware('auth');

Route::get('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
});