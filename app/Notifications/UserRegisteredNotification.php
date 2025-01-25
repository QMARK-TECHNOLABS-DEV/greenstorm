<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserRegisteredNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $user; // Add this property

    public function __construct($user) // Add this constructor
    {
        $this->user = $user;
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
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('GPF Account Creation')
            ->line('Your account has been created!')
            ->line('Thank you for registering with Greenstorm Global Photography Festival. Your account has been successfully created. We appreciate your decision to join the festival and we look forward to assisting you in your journey.')
            ->line('To proceed further, we kindly request you to fill in the necessary details in order to facilitate the process of photo upload')
            ->line('“Click your frame to global fame.”');
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
