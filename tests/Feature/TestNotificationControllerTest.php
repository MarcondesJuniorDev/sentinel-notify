<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class TestNotificationControllerTest extends TestCase
{
    public function test_notification_endpoint_dispatches_job()
    {
        Queue::fake();
        $response = $this->get('/test-notification?to=destinatario@teste.com&message=Mensagem+de+teste');
        $response->assertStatus(200)
            ->assertJsonFragment(['status' => 'Notificação enviada para fila']);
        Queue::assertPushed(\App\Jobs\SendNotificationJob::class);
    }
}
