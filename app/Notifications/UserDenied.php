<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;

class UserDenied extends Notification
{
    use Queueable;

    public $user;
    public $username;
    /**
     * Create a new notification instance.
     */
    public function __construct(User $user, $username)
    {
        $this->user = $user;
        $this->username = $username;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->greeting('Hello ' . $this->username . '!')
        ->subject('ID verification failed')
        ->line('We could not verify your identity, Please click the link below to resubmit a new ID photo. ')
        ->action('Upload ID verification', url('/verify-identity'))
        ->line('Thank you for using RaniHabet');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
