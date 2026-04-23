<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\TestNotificationController;
Route::get('/test-notification', TestNotificationController::class);

Route::get('/test-ping', function () {
    \Log::info('Ping OK');
    return response()->json(['ping' => 'pong']);
});
