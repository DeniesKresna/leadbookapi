<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Crypt;

class UserVerification extends Notification
{
    use Queueable;

    public $name;
    public $code;
    public $type;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name,$code,$type)
    {
        $this->name = $name;
        $this->code = $code;
        $this->type = $type;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $subject = "Registration Process";
        if($this->type=="forget-password")
            $subject = "Update Password Process";
        return (new MailMessage)
            ->subject($subject)
            ->markdown('mail.noreply.userconfirmation',['name'=>$this->name,'code'=>$this->code,'type'=>$this->type]);
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
