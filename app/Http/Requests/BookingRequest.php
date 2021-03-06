<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'email_user' => 'required|email',
            'booking_date' => 'required|date',
            'no_meja' => 'required|string|min:1',
            'total_booking' => 'required|numeric'
        ];
    }
}
