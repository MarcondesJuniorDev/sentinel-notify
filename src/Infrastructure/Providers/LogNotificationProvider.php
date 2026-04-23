<?php

namespace Src\Infrastructure\Providers;

use Src\Domain\NotificationProviderInterface;
use Illuminate\Support\Facades\Log;

class LogNotificationProvider implements NotificationProviderInterface
{
    public function send(string $to, string $message): bool
    {
        Log::info("Notificação enviada para {$to}: {$message}");
        return true;
    }
}
