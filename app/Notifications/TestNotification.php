<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TestNotification extends Notification
{
    use Queueable;
    private $name;

    public function __construct($name)
    {
        $this->name=$name;
    }


    public function via($notifiable)
    {
//        return ['mail','sms','database']; // chanal notification
        return ['database'];
    }


    public function toDatabase()
    {
        return [
            'id'=>'1',
            'title'=>$this->name,
            'date'=>'ss'
        ];
    }
//    public function toMail($notifiable)
//    {
//        return (new MailMessage)
//                    ->line('The introduction to the notification.')
//                    ->action('Notification Action', url('/'))
//                    ->line('Thank you for using our application!');
//    }

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
