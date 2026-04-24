<?php

namespace Tests\Unit;

use Tests\TestCase;
use Src\Infrastructure\Providers\WebhookNotificationProvider;

class WebhookNotificationProviderTest extends TestCase
{
    public function test_send_logs_webhook_and_returns_true()
    {
        $provider = new WebhookNotificationProvider();
        $this->assertTrue($provider->send('https://webhook.site/teste', 'Mensagem Webhook'));
    }
}
