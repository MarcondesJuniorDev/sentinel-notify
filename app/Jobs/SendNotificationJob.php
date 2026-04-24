<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;
use Src\Domain\NotificationProviderInterface;

class SendNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $to;
    public $message;

    /**
     * Create a new job instance.
     */
    public function __construct($to, $message)
    {
        $this->to = $to;
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $provider = App::make(NotificationProviderInterface::class);
        $provider->send($this->to, $this->message);
    }
}
