<?php

namespace Tests\Unit;

use Tests\TestCase;
use Src\Infrastructure\Providers\TelegramNotificationProvider;

class TelegramNotificationProviderTest extends TestCase
{
    public function test_send_logs_telegram_and_returns_true()
    {
        $provider = new TelegramNotificationProvider();
        $this->assertTrue($provider->send('@usuario', 'Mensagem Telegram'));
    }
}
