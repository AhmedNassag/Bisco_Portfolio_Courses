<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ProjectDetailAdded extends Notification
{
    use Queueable;
    public $route_id;

    
    public function __construct($route_id)
    {
        $this->route_id = $route_id;
    }

    
    
    public function via($notifiable)
    {
        return [/*'mail',*/ 'database'];
    }

    
    
    /*
    public function toMail($notifiable)
    {
        $url = 'http://127.0.0.1:8000/project-detail/'.$this->id;
        return (new MailMessage)
            ->subject('Coding System')
            ->line('New Notification.')
            ->action('Show', $url)
            ->line('Thank you for using our application!');
    }
    */

    
    
    public function toDatabase($notifiable)
    {
        return [
            'route' => 'project-detailShowNotification/'.$this->route_id.'',
            'title' => 'تم إضافة نبذة مشاريعنا بواسطة',
            'user'  => Auth::user()->name,
        ];
    }
}
