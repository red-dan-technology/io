<?php

use Illuminate\Support\Facades\Route;
use Rdt\IO\app\Http\Controllers\DeviceController;
use Rdt\IO\app\Http\Controllers\TestVerificationController;

Route::prefix('api/digitalpersona')->group(function () {
    // JAVA APPLICATION
    Route::post('device/start', [DeviceController::class, 'start']);
    Route::post('device/stop', [DeviceController::class, 'stop']);
    Route::get('event/{token}', [DeviceController::class, 'event']);
    Route::post('event/register', [DeviceController::class, 'register']);
    Route::post('event/update', [DeviceController::class, 'update']);
    // TEST FRONTED
    Route::resource('verification', TestVerificationController::class);

    Route::get('demo', function () {
        return view('IO::demo');
    });
});