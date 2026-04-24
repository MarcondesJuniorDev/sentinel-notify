<?php

namespace Src\Infrastructure\Providers;

use Src\Domain\NotificationProviderInterface;

class WhatsappNotificationProvider implements NotificationProviderInterface
{
    public function send($to, $message): bool
    {
        \Log::info('WhatsApp enviado (mock)', [
            'to' => $to,
            'message' => $message
        ]);
        // Aqui integraria com API real de WhatsApp
        return true;
    }
}
