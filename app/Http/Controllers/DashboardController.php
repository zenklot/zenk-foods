<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
 
    public function index()
    {
        return view('dashboard.index');
    }

    public function booking()
    {
        return view('dashboard.booking');
    }

    public function order()
    {
        return view('dashboard.order',[
            'title' => "ZenkFood | Menu",
            'pageSelect' => 'order'
        ]);
        
    }

    public function api_order_menu()
    {
        $menu = Menu::latest()->filter(request(['search', 'sort']))->paginate(6)->withQueryString();
        return response()->json($menu);
    }

    public function api_satu_kota(Request $request)
    {
        $jenis = $request->jenis;
        if ($jenis == 'kecamatan') {
            $respon = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=3207');
            return response($respon);
        }else if($jenis == 'kelurahan'){
            $idKec = $request->id_kecamatan;
            $respon = Http::get('https://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=' . $idKec);
            return response($respon);

        }
    }

    public function api_beda_kota(Request $request)
    {
        $jenis = $request->jenis;
        $id_prov = $request->id_provinsi;
        if($jenis == 'provinsi'){
            $respon = Http::get('https://api.rajaongkir.com/starter/province?key='. env('MIX_RAJA_ONGKIR_KEY'));
            return response($respon);
        }elseif($jenis == 'kota'){
            $respon = Http::get('https://api.rajaongkir.com/starter/city?province='. $id_prov .'&key='. env('MIX_RAJA_ONGKIR_KEY'));
            return response($respon);
        }elseif($jenis == 'cost'){
            $destination = $request->id_kota . '';
            $weight = $request->weight;
            $courier = $request->courier;
            $respon = Http::post('https://api.rajaongkir.com/starter/cost', ['key' => env('MIX_RAJA_ONGKIR_KEY'), 'origin' => '103', 'destination' => $destination, 'weight' => $weight, 'courier' => $courier]);
            return response($respon);
        }

    }
}
