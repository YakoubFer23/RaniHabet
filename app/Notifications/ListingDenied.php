<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Listing;
use App\Models\User;

class ListingDenied extends Notification
{
    use Queueable;
    public $listing;
    public $username;
    /**
     * Create a new notification instance.
     */
    public function __construct(Listing $listing, $username)
    {
        $this->listing = $listing;
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
        ->subject('Property Status Updated')
        ->line('Your property listing has been denied')
        ->line('Title: ' . $this->listing->title)
        ->line('Reason : It does not meet our standards, Please feel free to try again. We are sorry for the inconvenience.');
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
