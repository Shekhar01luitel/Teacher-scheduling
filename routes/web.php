<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StoreTotalClassController;
use App\Http\Controllers\ClassNameController;
use App\Http\Controllers\CustomSectionController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\CustomPeriodController;
use App\Http\Controllers\RelationClassSectionController;


Route::get('/debug', function () {
    Debugbar::info('Hello, Debugbar!');
    return view('welcome');
});


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
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/teacher', [AdminController::class, 'TeacherTable'])->name('teacher');
    // Route::delete('/forms/{form}', [AdminController::class, 'delete'])->name('forms.destroy');
    // Route::delete('/forms/{form}', [AdminController::class, 'delete'])->name('forms.destroy');
    Route::delete('/forms/{form}', [AdminController::class, 'delete'])->name('forms.destroy');


    Route::post('/teachers/update/{form}', [AdminController::class, 'update'])->name('teachers.update');
    // Route::get('/form', function () {
    //     return view('admin.content.teacher');
    // })->name('form');
    Route::get('/class', [AdminController::class, 'class'])->name('class');
    Route::post('/classname', [ClassNameController ::class, 'create'])->name('classname');
    Route::delete('/class/{form}', [ClassNameController::class, 'destroy'])->name('class.destroy');
    Route::put('/class/update/{class}', [ClassNameController ::class, 'update'])->name('class.update');


    Route::get('/division', [AdminController::class, 'section'])->name('section');
    Route::post('/create/section', [SectionController ::class, 'create'])->name('division.create.form');
    Route::delete('/division/{section}', [SectionController::class, 'destroy'])->name('division.destroy');
    Route::put('/division/update/{division}', [SectionController ::class, 'update'])->name('division.update');


    Route::get('/period', [AdminController::class, 'Period'])->name('periods');
    Route::post('/create/period', [CustomPeriodController::class, 'create'])->name('period.create.form');
    Route::delete('/period/{period}', [CustomPeriodController::class, 'destroy'])->name('period.destroy');
    Route::put('/period/update/{period}', [CustomPeriodController ::class, 'update'])->name('period.update');

    Route::get('/controller', [AdminController::class, 'Control'])->name('control');
    Route::post('/storetotalclass', [StoreTotalClassController ::class, 'create'])->name('storetotalclass');
    Route::delete('/form/{form}', [StoreTotalClassController::class, 'delete'])->name('school.destroy');
    Route::put('/updatestoretotalclass/{form}', [StoreTotalClassController ::class, 'update'])->name('school.update');
    // Route::resource('control', StoreTotalClassController::class);

    Route::get('/section-relation', [AdminController::class, 'ClassSection'])->name('class.section');
    Route::post('/sectionname', [CustomSectionController ::class, 'create'])->name('sectionname');
    Route::delete('/class-section/{form}', [CustomSectionController::class, 'destroy'])->name('section.destroy');
    Route::put('/seections/update/{class}', [CustomSectionController ::class, 'update'])->name('section.update');

    Route::get('/ClassRelationSetion', [AdminController::class, 'RelationClassSection'])->name('relationclasssection');
    Route::post('/relationclasssection', [RelationClassSectionController ::class, 'create'])->name('relationclasssection.create.form');
    Route::delete('/relationclasssection/{destory}', [RelationClassSectionController::class, 'destroy'])->name('relationclasssection.destroy');
    Route::put('/relationclasssection/update/{update}', [RelationClassSectionController ::class, 'update'])->name('relationclasssection.update');

});



Route::middleware(['auth', 'role:admin,teacher'])->group(function () {
    // Route::get('/form', function () {
    //     return view('admin.content.teacher');
    // })->name('form');
    Route::get('/form', [TeacherController::class, 'index'])->name('form');
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
