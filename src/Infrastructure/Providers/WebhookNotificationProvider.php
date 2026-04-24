<?php

namespace Src\Infrastructure\Providers;

use Src\Domain\NotificationProviderInterface;
use Illuminate\Support\Facades\Http;

class WebhookNotificationProvider implements NotificationProviderInterface
{
    public function send($to, $message): bool
    {
        // Simula envio de webhook (POST)
        \Log::info('Webhook enviado (mock)', [
            'url' => $to,
            'message' => $message
        ]);
        // Exemplo real:
        // Http::post($to, ['message' => $message]);
        return true;
    }
}
