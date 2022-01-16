<?php

namespace App\Services\Midtrans;

use Exception;
use Midtrans\Notification;

class NotificationService extends Midtrans {
   
    public function getNotification()
    {
        $notif = new Notification();
        
        return $notif;
    }

}