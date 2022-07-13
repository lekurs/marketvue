<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;

class ChangeEmailNotification extends Notification
{
    //use Queueable;

    protected string $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject(trans(config('app.name') . ' - Changement de votre email'))
            ->line(trans('Veuillez cliquer sur le bouton ci-dessous afin de mettre à jour votre adresse email'))
            ->action(trans('Vérifier mon email'), $this->verifyRoute($notifiable))
            ->line(trans("Si vous n'avez pas créé de compte veuillez ne pas tenir compte de cet email."));
    }

    protected function verifyRoute($notifiable): string
    {
        return URL::temporarySignedRoute('email.verify', 60 * 60, [
            'id' => $notifiable->getKey(),
            'email' => $this->email,
            'hash' => sha1($notifiable->getEmailForVerification()),
        ]);
    }
}
