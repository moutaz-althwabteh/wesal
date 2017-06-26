<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SmsNotification extends Notification
{
    use Queueable;



    public function via($notifiable)
    {
        return ['nexmo'];
    }


    public function toNexmo($notifiable)
    {

        return (new NexmoMessage())
            ->content('test Sms ')
            ->from('15554443333');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
