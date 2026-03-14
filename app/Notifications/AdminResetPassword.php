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

        $resetUrl = rtrim(config('app.url'), '/').$resetPath;

        return (new MailMessage)
            ->subject('Reset Your Admin Password')
            ->greeting('Hello,')
            ->line('We received a request to reset your Amrutam admin panel password.')
            ->line('Use the button below to choose a new password for your admin account.')
            ->action('Reset Admin Password', $resetUrl)
            ->line('If you did not request a password reset, you can safely ignore this email.')
            ->salutation('Regards,'.PHP_EOL.'Amrutam');
    }
}
