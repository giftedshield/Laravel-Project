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


// Route::get('/', [ProfilController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/profil', [ProfilController::class, 'profil']);
Route::get('/kontak', [KontakController::class, 'index']);
Route::get('/students', [StudentsController::class, 'index']);
Route::get('/guardians', [GuardiansController::class, 'index']);
Route::get('/classrooms', [ClassroomController::class, 'index']);
Route::get('/teachers', [TeacherController::class, 'index']);
Route::get('/subjects', [SubjectController::class, 'index']);



// Route::get('/student', function () {
//     return view('student',[
//         'title' => "Student"
//     ]);
// });