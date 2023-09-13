<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::fallback(function () {
    return view('pagenotfound');
});

// Route::get('/dashboard',  function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Admin Group
Route::middleware(['auth', 'role:admin,teacher'])->group(function () {

    Route::get('/teacher', [AdminController::class, 'TeacherTable'])->name('teacher');
    Route::delete('/forms/{form}', [AdminController::class, 'delete'])->name('forms.destroy');
    Route::post('/teachers/update/{form}', [AdminController::class, 'update'])->name('teachers.update');
    // Route::get('/form', function () {
    //     return view('admin.content.teacher');
    // })->name('form');
    Route::get('/class', [AdminController::class, 'class'])->name('class');

});

Route::middleware(['auth', 'role:admin,teacher'])->group(function () {
    // Route::get('/form', function () {
    //     return view('admin.content.teacher');
    // })->name('form');
    Route::get('/form/teacher', [TeacherController::class, 'index'])->name('form');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
    Route::post('/admin/update/teacher', [TeacherController::class, 'update'])->name('admin.teachers.update');
});




Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});



require __DIR__ . '/auth.php';
