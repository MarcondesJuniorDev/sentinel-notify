<?php

namespace Tests\Unit;

use Tests\TestCase;
use Src\Infrastructure\Providers\SmsNotificationProvider;

class SmsNotificationProviderTest extends TestCase
{
    public function test_send_logs_sms_and_returns_true()
    {
        $provider = new SmsNotificationProvider();
        $this->assertTrue($provider->send('5511999999999', 'Mensagem SMS'));
    }
}
