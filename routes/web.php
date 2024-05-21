<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    // Diğer admin route'ları
});

Route::middleware(['auth', 'role:standard'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.dashboard');
    // Diğer kullanıcı route'ları
});


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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/admin_login', function () {
    return view('admin.admin_login');
})->name('admin.login');

Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/user-management', function () {
    return view('admin.user_management');
})->name('admin.user_management');
Route::post('/admin/user', [AdminController::class, 'storeUser'])->name('admin.user.store');
Route::post('/admin/user/update', [AdminController::class, 'updateUser'])->name('admin.user.update');
Route::post('/admin/user/delete', [AdminController::class, 'deleteUser'])->name('admin.user.delete');


Route::get('/admin/announcement', function () {
    return view('admin.announcement');
})->name('admin.announcement');
Route::post('/admin/announcement', [AdminController::class, 'createAnnouncement'])->name('admin.createAnnouncement');

Route::get('/admin/read-messages', function () {
    return view('admin.read_messages');
})->name('admin.read_messages');


// User Routes
Route::get('/user/login', function () {
    return view('user.login');
})->name('user.login');

Route::post('/user/login', [UserController::class, 'login'])->name('user.login');

Route::get('/user/update-password', function () {
    return view('user.update_password');
})->name('user.update_password');

Route::post('/user/update-password', [UserController::class, 'updatePassword'])->name('user.update_password');

Route::get('/user/messages', [UserController::class, 'showMessages'])->name('user.messages');
Route::post('/user/messages', [UserController::class, 'sendMessage'])->name('user.sendMessage');
