<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class BlogMail extends Mailable
{
    use Queueable, SerializesModels;

    private $blog;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($blog)
    {
        $this->blog = $blog;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('no-reply@theblogger.com')
            ->to(Auth::user())
            ->subject('TheBlogger: Blog copy')
            ->view('mail')
            ->with(['blog' => $this->blog]);
    }
}
