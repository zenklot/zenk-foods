<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodsOrderDet extends Model
{
    use HasFactory;
  
    protected $table = 'foods_order_dets';
    protected $fillable = [
        'order_id',
        'image',
        'nama_menu',
        'catatan',
        'harga',
        'qty',
        'sub_total'
    ];

    public function foods_order_head(){
        return $this->belongsTo(FoodsOrderHead::class, 'order_id');
    }


}
