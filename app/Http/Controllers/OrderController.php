<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderSatuKotaRequest;
use App\Models\FoodsOrderDet;
use App\Models\FoodsOrderHead;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
 
    public function satu_kota(OrderSatuKotaRequest $request)
    {
        
       $result =  DB::transaction(function() use ($request) {
            $orderId = IdGenerator::generate(['table' => 'foods_order_heads', 'field' => 'order_id', 'length' => 15, 'prefix' => 'F-'.date('ymdhi') ]);
            
            $dataOrder['order_id'] = $orderId;
            $dataOrder['email_user'] = auth()->user()->email;
            $dataOrder['jenis'] = 'satu_kota';
            $dataOrder['jasa_kirim'] = 'cod';
            $dataOrder['estimasi'] = '± 3 Jam';
            $dataOrder['total'] = $request->total;
            $dataOrder['kecamatan'] = $request->kecamatan;
            $dataOrder['kelurahan'] = $request->kelurahan;
            $dataOrder['kode_pos'] = (int)$request->kode_pos;
            $dataOrder['harga_ongkir'] = $request->harga_ongkir;
            $dataOrder['alamat_rumah'] = $request->alamat_rumah;
            $dataOrder['nama_pemesan'] = $request->nama_pemesan;
            $dataOrder['no_hp'] = $request->no_hp;
            $dataOrder['order_at'] = Carbon::now()->toDateTimeString();
            
            // dd($dataOrder);
            FoodsOrderHead::create($dataOrder);
            $keranjang = collect($request->cart)->map(function($c) use($orderId){
                return [
                    'order_id' => $orderId,
                    'image' => $c['image'],
                    'nama_menu' => $c['nama_menu'],
                    'catatan' => $c['note'],
                    'harga' => $c['harga'],
                    'qty' => $c['qty'],
                    'sub_total' => $c['harga'] * $c['qty']
                ];
            })->toArray();
            // dd($keranjang);
            FoodsOrderDet::insert($keranjang);
            
        });

        if($result == null){
            return response();
        }else{
            return response(null,500);
        }
    }
}
