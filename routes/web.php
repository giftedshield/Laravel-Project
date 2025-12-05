<?php

use Illuminate\Support\Facades\Route;   
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\GuardiansController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\AdminStudentController;
use App\Http\Controllers\admin\AdminClassroomController;


// Route::get('/', [ProfilController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/profil', [ProfilController::class, 'profil']);
Route::get('/kontak', [KontakController::class, 'index']);
Route::get('/students', [StudentsController::class, 'index']);
Route::get('/guardians', [GuardiansController::class, 'index']);
Route::get('/classrooms', [ClassroomController::class, 'index']);
Route::get('/teachers', [TeacherController::class, 'index']);
Route::get('/subjects', [SubjectController::class, 'index']);
Route::get('/dashboard', function (){
    return view('admin.dashboard'); 
});
Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index']);

Route::get('/profile', function () {
    return view('profile',[
        'title' => 'Profile'
    ]);
});

Route::resource('student', StudentController::class);
Route::resource('classrooms', ClassroomController::class);

Route::get('/classroom', [ClassroomController::class, 'index']);

Route::get('/admin/dashboard', [DashboardController::class, 'index']);

// Admin student routes
Route::get('/admin/student', [AdminStudentController::class, 'index'])->name('students.index');
Route::post('/admin/student', [AdminStudentController::class, 'store'])->name('students.store');
Route::delete('admin/students/{student}', [AdminStudentController::class, 'destroy'])->name('students.destroy');
Route::get('admin/students/{student}/edit', [AdminStudentController::class, 'edit'])->name('students.edit');
Route::put('admin/students/{student}', [AdminStudentController::class, 'update'])->name('students.update');


Route::get('/admin/classroom', [AdminClassroomController::class, 'index']);
Route::post('admin/classroom', [AdminClassroomController::class, 'store'])->name('classrooms.store');



// Route::get('/student', function () {
//     return view('student',[
//         'title' => "Student"
//     ]);
// });