<?php

namespace App\Notifications;

use App\Jobs\SendNotificationEmail;
use App\Mail\NoticeMail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Mail;

class NoticeNotification extends Notification
{
    use Queueable;

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toMail(object $notifiable)
    {
    }

    public function toDatabase(object $notifiable): array
    {
        $email = $notifiable->email;
        $user = User::find($notifiable->id);
        $settings = $user->setting;
        if($settings){
            if ($settings->email_notification && $settings->email_notification == 1) {
                SendNotificationEmail::dispatch($email,$notifiable, $this->data);
            }
        }
        
        return [
            'custom_type' => "Notice Notification",
            'title' => $this->data->title,
            'content' => $this->data->content,
            'type' => $this->data->type,
            'time' => $this->data->created_at,
            'id' => $this->data->id,
        ];
    }
}
