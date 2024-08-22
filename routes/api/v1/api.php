<?php

use App\Http\Controllers\TestCertificateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/certificates/verify/{token}', [TestCertificateController::class, 'verify'])
    ->name('api.certificates.verify');
