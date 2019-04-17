<?php

namespace App\Jobs;

use App\Mail\ComunicadoMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class EnviarEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $comunicadoMail = null;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ComunicadoMail $comunicadoMail)
    {
        $this->comunicadoMail = $comunicadoMail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::send($this->comunicadoMail);
    }
}
