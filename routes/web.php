<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/dashboard');

Route::view('login', 'login')->name('login');
Route::get('register', [AuthController::class, 'registerView'])->name('register');

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/search', [UserController::class, 'search'])->name('search');

    Route::delete('/users-destroy/{user}', [UserController::class, 'delete'])->name('users.destroy');
    Route::get('/users-show/{user}', [UserController::class, 'show'])->name('users.show');
    Route::put('/users-edit/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/dashboard', [UserController::class, 'getUsers'])->name('dashboard');
});





// Route::redirect('/', '/dashboard');


// Route::get('/dashboard', )
