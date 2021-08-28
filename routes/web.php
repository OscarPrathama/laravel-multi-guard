<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Editor\EditorController;
use App\Models\Editor;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
})->name('home');

Auth::routes();

Route::prefix('user')->name('user.')->group(function(){

    /**
     * guest:web -> specify a guard name to every function you made
     * on this guest middleware you can specify a guard name like guest:web
    */
    Route::middleware(['guest:web', 'PreventBackHistory'])->group(function(){
        Route::view('/login', 'dashboard.user.login')->name('login');
        Route::view('/register', 'dashboard.user.register')->name('register');
        Route::post('/create', [UserController::class, 'create'])->name('create');
        Route::post('/check', [UserController::class, 'check'])->name('check');
    });

    /**
     * and also you can specify guard name on the auth middleware like this auth:web
    */
    Route::middleware(['auth:web', 'PreventBackHistory'])->group(function(){
        Route::view('/home', 'dashboard.user.home')->name('home');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    });
});

Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function(){
        Route::view('/login', 'dashboard.admin.login')->name('login');
        Route::post('/check', [AdminController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function(){
        Route::view('/home', 'dashboard.admin.home')->name('home');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });

});

Route::prefix('editor')->name('editor.')->group(function(){

    Route::middleware(['guest:editor', 'PreventBackHistory'])->group(function(){
        Route::view('/login', 'dashboard.editor.login')->name('login');
        Route::view('/register', 'dashboard.editor.register')->name('register');
        Route::post('/create', [EditorController::class, 'create'])->name('create');
        Route::post('/check', [EditorController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:editor', 'PreventBackHistory'])->group(function(){
        Route::view('/home', 'dashboard.editor.home')->name('home');
        Route::post('/logout', [EditorController::class, 'logout'])->name('logout');
    });

});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
