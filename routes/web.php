<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [StudentController::class, 'homepage'])->name('homepage');
Route::get('/students/data', [StudentController::class, 'getStudentData'])->name('students.data');
Route::get('/edit-student', [StudentController::class, 'editStudent'])->name('editStudent');
Route::post('/student/update-student', [StudentController::class, 'updateStudent'])->name('student.updateStudent');
Route::post('/deleteStudent', [StudentController::class, 'deleteStudent'])->name('deleteStudent');
Route::get('/add-student', [StudentController::class, 'addStudent'])->name('addStudent');
Route::post('/store-student', [StudentController::class, 'storeStudent'])->name('student.storeStudent');
Route::get('/teachers', [TeacherController::class, 'teachers'])->name('teachers');
Route::get('/teachers/data', [TeacherController::class, 'getTeacherData'])->name('teachers.data');

// admin
Route::get('/sign-up', [AdminController::class, 'signUp'])->name('signUp');
Route::post('/store-admin', [AdminController::class, 'storeAdmin'])->name('storeAdmin');
Route::get('/log-in', [AdminController::class, 'login'])->name('login');
Route::post('/login-admin', [AdminController::class, 'loginAdmin'])->name('loginAdmin');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
