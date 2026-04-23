<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Domain\NotificationProviderInterface;
use Src\Infrastructure\Providers\LogNotificationProvider;
use Src\Infrastructure\Providers\EmailNotificationProvider;

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
