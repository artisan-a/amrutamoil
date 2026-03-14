<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class AdminResetPassword extends Notification
{
    use Queueable;

    public function __construct(
        public string $token
    ) {
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $resetPath = route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false);

        $appUrl = rtrim(config('app.url'), '/');
        $resetUrl = $appUrl.$resetPath;

        return (new MailMessage)
            ->subject('Reset Your Password')
            ->view('emails.admin-reset-password', [
                'appUrl' => $appUrl,
                'resetUrl' => $resetUrl,
                'year' => now()->year,
            ]);
    }
}
