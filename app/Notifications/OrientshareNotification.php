<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class OrientshareNotification extends Notification
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

    public function toMail(object $notifiable) {}

    public function toDatabase(object $notifiable): array
    {
        //create ativity for user who received
        return [
            'custom_type' => "Orientdrop File Shared",
            'title' => $this->data->shared_by_name . ' shared a file.',
            'content' => $this->data->content,
            'file_name' => $this->data->filename,
            'share_id' => $this->data->share_id,
            'shared_by' => $this->data->shared_by,
            'shared_by_name' => $this->data->shared_by_name,
            'shared_date' => $this->data->shared_date,
            'shared_until' => $this->data->shared_until,
            'user_type' => $this->data->user_type,
        ];
    }
}
