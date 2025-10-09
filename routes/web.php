<?php

// routes/web.php
use App\Http\Controllers\JournalController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassRoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('journals.index');
});

// Journals Routes
Route::resource('journals', JournalController::class);

// Teachers Routes
Route::resource('teachers', TeacherController::class);

// Subjects Routes
Route::resource('subjects', SubjectController::class);

// Classes Routes
Route::resource('classes', ClassroomController::class);