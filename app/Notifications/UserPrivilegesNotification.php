<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserPrivilegesNotification extends Notification
{
    use Queueable;
    protected $data;


    /**
     * Create a new notification instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'custom_type' => "User Privileges Notification",
            'title' => $this->data->title,
            'content' => $this->data->content,
            'time' => now()
        ];
    }
}
