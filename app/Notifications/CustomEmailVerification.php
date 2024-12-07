<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomEmailVerification extends Notification
{
    use Queueable;

    protected $user_id, $expiresAt;

    /**
     * Create a new notification instance.
     */
    public function __construct($user_id)
    {
        $this->user_id = $user_id;
        $this->expiresAt = Carbon::now()->addMinutes(30);
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
            ->subject('Verify your email address')
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/email-verify/'.$this->user_id.'/'.$this->expiresAt))
            ->line('The link will expire in '.$this->expiresAt->format('d-m-Y H:i:s'))
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
