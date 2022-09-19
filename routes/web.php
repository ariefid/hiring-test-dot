<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => null, 'middleware' => ['prevent-back-history'], 'as' => 'web.'], function () {
    Route::match(['get', 'head'], null, function () {
        return redirect()->route('web.dashboard.index');
    })->middleware(['auth', 'verified:web.authentication.not-verified'])->name('index');

    Route::group(['prefix' => 'authentication', 'middleware' => [], 'as' => 'authentication.'], function () {
        Route::match(['get', 'head'], 'register', [App\Http\Controllers\Authentication\RegisterController::class, 'index'])->middleware(['guest'])->name('register');

        Route::match(['post'], 'register', [App\Http\Controllers\Authentication\RegisterController::class, 'store'])->middleware(['guest'])->name('register');

        Route::match(['get', 'head'], 'login', [App\Http\Controllers\Authentication\LoginController::class, 'index'])->middleware(['guest'])->name('login');

        Route::match(['post'], 'login', [App\Http\Controllers\Authentication\LoginController::class, 'update'])->middleware(['guest'])->name('login');

        Route::match(['get', 'head'], 'logout', [App\Http\Controllers\Authentication\LogoutController::class, 'index'])->middleware(['auth', 'verified:web.authentication.not-verified'])->name('logout');

        Route::match(['get', 'head'], 'not-verified', [App\Http\Controllers\Authentication\NotVerifiedController::class, 'index'])->middleware([])->name('not-verified');
    });

    Route::group(['prefix' => 'user', 'middleware' => ['auth', 'verified:web.authentication.not-verified'], 'as' => 'user.'], function () {
        Route::match(['get', 'head'], 'change-password', [App\Http\Controllers\User\ChangePasswordController::class, 'index'])->name('change-password');

        Route::match(['put'], 'change-password', [App\Http\Controllers\User\ChangePasswordController::class, 'update'])->name('change-password');
    });

    Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'verified:web.authentication.not-verified'], 'as' => 'dashboard.'], function () {
        Route::match(['get', 'head'], null, [App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('index');

        Route::resource('todos', App\Http\Controllers\Dashboard\TodoController::class, ['middleware' => [], 'as' => null])->parameters([
            'todos' => 'id',
        ])->scoped(['id' => 'uuid']);
    });

    Route::fallback([App\Http\Controllers\Error\ErrorController::class, 'custom404']);
});
