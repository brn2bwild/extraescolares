<?php

use App\Http\Controllers\Admin\StudentGradeController;
use App\Livewire\Students\Certificate;
use App\Livewire\Students\Register;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('home');
})->name('home');

Route::get('/students/register', Register::class)
	->name('students.register');

Route::get('/students/certificate', Certificate::class)
	->name('students.certificate');

Route::get('/admin/student_grades/{id}', StudentGradeController::class)
	->middleware('auth')
	->name('admin.student_grades');
