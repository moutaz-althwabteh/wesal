<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class EmailNotification extends Notification
{
    use Queueable;
    private $user;

    public function __construct(User $user)
    {
        $this->user=$user;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail($notifiable)
    {
        return (new MailMessage)
//                    ->line('مرحبا بك يا '.$this->user->first_name)
//                    ->action('لتفعيل حسابك', url('/'))
//                    ->line('Thank you for using our application!');
        ->view('emails.NotificationEmail',['user'=>$this->user]);
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
