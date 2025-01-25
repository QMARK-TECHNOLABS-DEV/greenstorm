<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Solarium\SendinBlueLaravel\Transport\SendinBlueTransport;

class PhotographUploadedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $photo_id; // Add this property

    public function __construct($photo_id) // Add this constructor
    {
        $this->photo_id = $photo_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('GFP Photo Upload Complete')
                    ->line('We are delighted to inform you that your photograph has been successfully uploaded to your profile on Greenstorm Foundation.')
                    ->line('To facilitate easy access and reference, we have assigned a unique ID to your uploaded photograph. Please find below the details of your photograph:')
                    // ->line('Unique ID: '.$this->photo_id.'')
                    ->line('If you have any further questions, require assistance, or would like to engage in discussions about your photograph, please do not hesitate to reach out to our support team. Together, let’s make a significant impact in creating a sustainable future for generations to come.')
                    ->action('View Photograph', url('/profile/list-uploaded-photographs'))
                    ->line('To download your participation certificate, click the following url. '.(route('mail.generate.certificate', ['token' => $notifiable->cert_token])))
                    ->line('All the very best.');
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
    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Your photograph has been successfully uploaded.',
            'url' => '/profile/list-uploaded-photographs', // Customize this URL
            'certificate_url' => route('mail.generate.certificate', ['token' => $notifiable->cert_token])
        ];
    }
}
