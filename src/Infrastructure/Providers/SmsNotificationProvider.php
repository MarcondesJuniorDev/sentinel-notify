<?php

namespace Src\Infrastructure\Providers;

use Src\Domain\NotificationProviderInterface;

class SmsNotificationProvider implements NotificationProviderInterface
{
    public function send($to, $message): bool
    {
        \Log::info('SMS enviado (mock)', [
            'to' => $to,
            'message' => $message
        ]);
        // Aqui integraria com um gateway real de SMS
        return true;
    }
}
