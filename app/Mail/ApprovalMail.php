<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class ApprovalMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    
    public $user;
    public $password;

    public function __construct(User $user,$password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('Mail.accepted')->attachFromStorage('terms.pdf', 'Terms And Conditions.pdf', [
            'mime' => 'application/pdf'
        ])->attachFromStorage('steps.pdf', 'Steps Of Activation.pdf', [
            'mime' => 'application/pdf'
        ]);
    }
}
