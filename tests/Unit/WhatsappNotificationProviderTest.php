<?php

namespace Tests\Unit;

use Tests\TestCase;
use Src\Infrastructure\Providers\WhatsappNotificationProvider;

class WhatsappNotificationProviderTest extends TestCase
{
    public function test_send_logs_whatsapp_and_returns_true()
    {
        $provider = new WhatsappNotificationProvider();
        $this->assertTrue($provider->send('5511999999999', 'Mensagem WhatsApp'));
    }
}
