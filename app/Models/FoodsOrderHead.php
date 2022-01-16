<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodsOrderHead extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'foods_order_heads';
    protected $fillable = [
        'order_id',
        'email_user',
        'jenis',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'jasa_kirim',
        'estimasi',
        'kode_pos',
        'harga_ongkir',
        'alamat_rumah',
        'no_hp',
        'total',
        'no_resi',
        'order_at'
    ];


    public function user(){
        return $this->belongsTo(User::class, 'email_user');
    }

    public function foods_order_det()
    {
        return $this->hasMany(FoodsOrderDet::class);
    }



}
