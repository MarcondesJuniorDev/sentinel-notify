<?php

namespace Tests\Unit;

use Tests\TestCase;
use Src\Infrastructure\Providers\LogNotificationProvider;
use Illuminate\Support\Facades\Log;

class LogNotificationProviderTest extends TestCase
{
    public function test_send_logs_notification_and_returns_true()
    {
        $provider = new LogNotificationProvider();
        $this->assertTrue($provider->send('destinatario@teste.com', 'Mensagem de teste'));
    }
}
