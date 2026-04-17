<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\ComplaintController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function () {

    if (Auth::check()) {
        return redirect(
            Auth::user()->role == 'admin'
            ? '/admin'
            : '/dashboard'
        );
    }

    return view('auth.login');

})->name('login');

Route::post('/login', function (Request $request) {

    $request->validate([
        'username' => 'required',
        'password' => 'required',
        'role' => 'required'
    ]);

    if (Auth::attempt([
        'username' => $request->username,
        'password' => $request->password,
        'role' => $request->role
    ])) {

        $request->session()->regenerate();

        return redirect(
            Auth::user()->role == 'admin'
            ? '/admin'
            : '/dashboard'
        );
    }

    return back()->withErrors([
        'username' => 'Login gagal'
    ]);
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/register', function (Request $request) {

    $request->validate([
        'nama' => 'required',
        'username' => 'required|unique:users,username',
        'password' => 'required|min:3'
    ]);

    User::create([
        'nama' => $request->nama,
        'username' => $request->username,
        'password' => Hash::make($request->password),
        'role' => 'siswa'
    ]);

    return redirect('/login');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [ComplaintController::class, 'index']);

    Route::get('/admin', [ComplaintController::class, 'admin']);

    Route::post('/complaint', [ComplaintController::class, 'store']);

    Route::post('/status/{id}', [ComplaintController::class, 'status']);

    Route::delete('/hapus/{id}', [ComplaintController::class, 'destroy']);

    Route::delete('/selesai/{id}', [ComplaintController::class, 'selesai']);

    Route::get('/logout', function () {

        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');

    });

});