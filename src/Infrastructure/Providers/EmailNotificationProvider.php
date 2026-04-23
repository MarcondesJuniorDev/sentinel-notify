<?php

namespace Src\Infrastructure\Providers;

use Src\Domain\NotificationProviderInterface;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class EmailNotificationProvider implements NotificationProviderInterface
{
    public function send(string $to, string $message): bool
    {
        try {
            Mail::raw($message, function ($mail) use ($to) {
                $mail->to($to)
                    ->subject('Notificação do Sistema');
            });
            return true;
        } catch (\Exception $e) {
            Log::error('Erro ao enviar e-mail: ' . $e->getMessage(), [
                'exception' => $e,
                'to' => $to,
                'message' => $message,
            ]);
            return false;
        }
    }
}
