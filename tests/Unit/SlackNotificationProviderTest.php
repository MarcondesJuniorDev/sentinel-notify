<?php

namespace Tests\Unit;

use Tests\TestCase;
use Src\Infrastructure\Providers\SlackNotificationProvider;

class SlackNotificationProviderTest extends TestCase
{
    public function test_send_logs_slack_and_returns_true()
    {
        $provider = new SlackNotificationProvider();
        $this->assertTrue($provider->send('#canal', 'Mensagem Slack'));
    }
}
