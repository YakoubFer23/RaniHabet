<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Listing;

class ListingStatusChanged extends Notification
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
        ->line('The status of your Property has changed.')
        ->line('Title: ' . $this->listing->title)
        ->line('New Status: ' . $this->listing->status)
        ->action('View Listing', url('/listings/' . $this->listing->id))
        ->line('Thank you for using our application!');
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
