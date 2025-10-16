<?php

// routes/web.php
use App\Http\Controllers\JournalController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassRoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return view('welcome');
});

// Journals Routes
Route::resource('journals', JournalController::class);

// Teachers Routes
Route::resource('teachers', TeacherController::class);

// Teacher Absence (izin sakit) Routes
use App\Http\Controllers\TeacherAbsenceController;
Route::get('teacher-absences/create', [TeacherAbsenceController::class, 'create'])->name('teacher-absences.create');
Route::post('teacher-absences', [TeacherAbsenceController::class, 'store'])->name('teacher-absences.store');

// Subjects Routes
Route::resource('subjects', SubjectController::class);

// Classes Routes
Route::resource('classes', ClassroomController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/dashboard', function () {
    return "dashboard admin";
})->middleware(['auth', 'role:admin']);

Route::get('teacher/dashboard', function () {
    return " dashboard teacher";
})->middleware(['auth', 'role:teacher']);

Route::get('waiting-confirmation', function () {
    return "waiting confirmation";
})->middleware(['auth']);
