<?php


use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VisaoGeralController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [PrincipalController::class, 'index'])->name('principal');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [UsuarioController::class, 'logout'])->name('usuario.logout');

    Route::get('/visao-geral', [VisaoGeralController::class, 'index'])->name('visao-geral');

    Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil');
    Route::put('/perfil', [PerfilController::class, 'atualizar'])->name('perfil.atualizar');
    Route::put('/perfil/preferencias', [PerfilController::class, 'preferencias'])->name('perfil.preferencias');
    Route::put('/perfil/senha', [PerfilController::class, 'senha'])->name('perfil.senha');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [UsuarioController::class, 'index'])->name('login');
    Route::get('/register', [UsuarioController::class, 'create'])->name('register');
    Route::post('/login', [UsuarioController::class, 'login'])->name('usuario.login');
    Route::post('/register', [UsuarioController::class, 'register'])->name('usuario.register');
});

Route::fallback(function () {
    if (Auth::check()) {
        return redirect()->route('visao-geral');
    } else {
        return redirect()->route('login');
    }
});
