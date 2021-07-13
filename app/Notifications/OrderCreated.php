<?php

namespace App\Notifications;
use App\Channels\Messages\WhatsAppMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Channels\WhatsAppChannel;
use App\Models\Order;
class OrderCreated extends Notification{
    use Queueable;
    public $to;
    public $content;
    public function __construct($to,$content){
        $this->to = $to;
        $this->content = $content;
    }
    public function via($notifiable){
        return [WhatsAppChannel::class];
    }
    public function toWhatsApp($notifiable){
        $TheMessage = new WhatsAppMessage;
        $TheMessage->content = $this->content;
        $TheMessage->to = $this->to;
        return $TheMessage;
    }
    public function toArray($notifiable){
        return [
            //
        ];
    }
}
