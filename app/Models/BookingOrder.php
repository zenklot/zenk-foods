<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingOrder extends Model
{
    use HasFactory;
    protected $table = 'booking_orders';
    protected $fillable = ['booking_id', 'email_user','total_booking','booking_date','no_meja','payment_status','booking_status', 'snap_token'];
    protected $primaryKey = 'booking_id';
    public $incrementing = false;
    protected $keyType = 'string';

    public function user(){
        return $this->belongsTo(User::class, 'email_user');
    }
}
