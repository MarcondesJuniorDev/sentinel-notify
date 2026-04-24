<?php

namespace Src\Infrastructure\Providers;

use Src\Domain\NotificationProviderInterface;

class SlackNotificationProvider implements NotificationProviderInterface
{
    public function send($to, $message): bool
    {
        \Log::info('Slack enviado (mock)', [
            'to' => $to,
            'message' => $message
        ]);
        // Aqui integraria com API real do Slack
        return true;
    }
}
