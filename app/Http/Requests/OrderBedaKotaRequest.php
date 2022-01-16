<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderBedaKotaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'provinsi' => 'required',
            'kota' => 'required',
            'jasa_kirim' => 'required',
            'service' => 'required',
            'kode_pos' => 'required|min:5|max:5',
            'harga_ongkir' => 'required',
            'alamat_rumah' => 'required',
            'nama_pemesan' => 'required',
            'no_hp' => 'required',
            'cart' => 'required',
        ];
    }
}
