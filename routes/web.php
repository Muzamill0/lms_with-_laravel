<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\ClassShiftController;
use App\Http\Controllers\CourseController;
// use App\Models\Role;
// use App\Models\User;
// use Illuminate\Support\Facades\Hash;
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

Route::controller(LoginController::class)->group(function () {
     
    Route::get('/login', 'view')->name('login');
    Route::post('/login', 'login');
});

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::controller(CourseController::class)->group(function () {
        Route::get('courses', 'index')->name('courses');
        Route::get('add/course', 'create')->name('course.create');
        Route::post('add/course', 'store');
        Route::get('edit/{course}/course', 'edit')->name('course.edit');
        Route::post('edit/{course}/course', 'update');
    });

    Route::controller(ClassShiftController::class)->group(function () {
        Route::get('shifts', 'index')->name('shifts');
        Route::get('add/shift', 'create')->name('shift.create');
        Route::post('add/shift', 'store');
        Route::get('edit/{shift}/shift', 'edit')->name('shift.edit');
        Route::post('edit/{shift}/shift', 'update');
    });

});


Route::get('/teacher/dashboard', function () {
    return "Teacher Dashboard";
})->name('teacher.dashboard');

Route::get('/student/dashboard', function () {
    return "Student Dashboard";
})->name('student.dashboard');

// Route::get('/create', function() {
//     return Hash::make('12345');
// });

