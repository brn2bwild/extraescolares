<?php

use App\Livewire\Students\Certificate;
use App\Livewire\Students\Register;
use Illuminate\Support\Facades\Route;
use Spatie\LaravelPdf\facades\PDF;

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

Route::get('/', function () {
	return view('home');
})->name('home');

Route::get('/students/register', Register::class)->name('students.register');

Route::get('/students/certificate', Certificate::class)->name('students.certificate');

