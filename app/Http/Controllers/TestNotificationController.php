<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Src\Domain\NotificationProviderInterface;

class TestNotificationController extends Controller
{
    public function __invoke(Request $request, NotificationProviderInterface $notifier)
    {
        \Log::info('Entrou no TestNotificationController', [
            'provider' => env('NOTIFICATION_PROVIDER'),
            'to' => $request->query('to'),
            'message' => $request->query('message'),
        ]);
        $to = $request->query('to', 'teste@exemplo.com');
        $message = $request->query('message', 'Mensagem de teste!');
        $ok = $notifier->send($to, $message);
        if ($ok) {
            return response()->json(['status' => 'Notificação enviada', 'to' => $to, 'message' => $message]);
        } else {
            return response()->json(['status' => 'Erro ao enviar notificação', 'to' => $to, 'message' => $message], 500);
        }
    }
}
