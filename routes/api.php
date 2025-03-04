<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::post('/send-message', function (Request $request) {
    $messageData = [
        'sender' => $request->input('sender'),
        'message' => $request->input('message'),
        'timestamp' => now()->toISOString(),
    ];

    // Ghi log (có thể lưu vào database nếu cần)
    Log::info('Received message:', $messageData);

    // Gửi message tới WebSocket Server (Node.js)
    // Http::post('http://localhost:3000/broadcast', $messageData);

    return response()->json(['success' => true]);
})->name('api.send-message');
