<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProfileCompletionNotification extends Notification
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
        // return ['mail'];
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('GPF Profile Completion')
                    ->line('Your profile setup is complete!')
                    ->line('We are pleased to inform you that your profile setup for the 15th edition of
                            Greenstorm Global Photography Festival is now complete. Thank you for providing
                            the necessary details. We kindly request you to proceed with uploading your
                            photos. Your photographs will not only inspire others but also contribute to building
                            a vibrant and collaborative community.')
                    // ->action('Notification Action', url('/'))
                    ->line('Click your frame to global fame.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'Your profile details has been updated!',
            'description' => 'We are pleased to inform you that your profile setup for the 15th edition of Greenstorm Global Photography Festival is now complete. Thank you for providing the necessary details. We kindly request you to proceed with uploading your photos. Your photographs will not only inspire others but also contribute to building a vibrant and collaborative community.',
            'action' => 'Click your frame to global fame.',
            // Add any other custom data you need here
        ];
    }
}
