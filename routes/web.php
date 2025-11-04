<?php

// routes/web.php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Teacher\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

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

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware(['auth', 'role:admin,teacher']);


Route::get('teacher/dashboard', [DashboardController::class, 'index'])->name('teacher.dashboard');

Route::get('waiting-confirmation', function () {
    return view("authenticated.waiting-confirmation");
})->middleware(['auth'])->name('waiting-confirmation');

Route::get('/home',[HomeController::class,'index'])->name('home');

Route::get('confirmations', [ConfirmationController::class, 'index'])->name('teacher-confirmations');