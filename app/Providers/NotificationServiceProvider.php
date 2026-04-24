<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Domain\NotificationProviderInterface;
use Src\Infrastructure\Providers\LogNotificationProvider;
use Src\Infrastructure\Providers\EmailNotificationProvider;
use Src\Infrastructure\Providers\SmsNotificationProvider;
use Src\Infrastructure\Providers\WhatsappNotificationProvider;
use Src\Infrastructure\Providers\SlackNotificationProvider;
use Src\Infrastructure\Providers\TelegramNotificationProvider;
use Src\Infrastructure\Providers\WebhookNotificationProvider;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(NotificationProviderInterface::class, function ($app) {
            $provider = env('NOTIFICATION_PROVIDER', 'log');
            return match ($provider) {
                'email' => $app->make(EmailNotificationProvider::class),
                'sms' => $app->make(SmsNotificationProvider::class),
                'whatsapp' => $app->make(WhatsappNotificationProvider::class),
                'slack' => $app->make(SlackNotificationProvider::class),
                'telegram' => $app->make(TelegramNotificationProvider::class),
                'webhook' => $app->make(WebhookNotificationProvider::class),
                default => $app->make(LogNotificationProvider::class),
            };
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
