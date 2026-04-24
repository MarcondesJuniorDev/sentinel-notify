<?php

namespace Src\Infrastructure\Providers;

use Src\Domain\NotificationProviderInterface;

class TelegramNotificationProvider implements NotificationProviderInterface
{
    public function send($to, $message): bool
    {
        \Log::info('Telegram enviado (mock)', [
            'to' => $to,
            'message' => $message
        ]);
        // Aqui integraria com API real do Telegram
        return true;
    }
}
