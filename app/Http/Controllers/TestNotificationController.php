<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendNotificationJob;

class TestNotificationController extends Controller
{
    public function __invoke(Request $request)
    {
        \Log::info('Entrou no TestNotificationController', [
            'provider' => env('NOTIFICATION_PROVIDER'),
            'to' => $request->query('to'),
            'message' => $request->query('message'),
        ]);
        $to = $request->query('to', 'teste@exemplo.com');
        $message = $request->query('message', 'Mensagem de teste!');
        // Dispara o job para fila
        SendNotificationJob::dispatch($to, $message);
        return response()->json(['status' => 'Notificação enviada para fila', 'to' => $to, 'message' => $message]);
    }
}
