<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\BookingOrder;
use App\Models\User;
use App\Services\Midtrans\SnapTokenService;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequest $request)
    {
        $bookingId = IdGenerator::generate(['table' => 'booking_orders', 'field' => 'booking_id', 'length' => 15, 'prefix' => 'B-'.date('ymdhi') ]);
        $dataBooking = $request->all();
        $dataBooking['booking_id'] = $bookingId;
        $dataBooking['booking_status'] = 'pending';
        $dataBooking['payment_status'] = 'pending';
        // $user = User::find(auth()->user()->email)->toArray();
        // $midtrans = new SnapTokenService($dataBooking, $user);
        // $snapToken = $midtrans->getSnapToken();
        // $dataBooking['snap_token'] = $snapToken;
        
        BookingOrder::create($dataBooking);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookingOrder  $bookingOrder
     * @return \Illuminate\Http\Response
     */
    public function show(BookingOrder $bookingOrder)
    {
        // $user = User::where('email', $request->email_user)->get(['nama_user','email','no_hp'])->toArray();
        // $dataBooking['user'] = $user;
        // $midtrans = new SnapTokenService($dataBooking);
        // $snapToken = $midtrans->getSnapToken();
        // $dataBooking['snap_token'] = $snapToken;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookingOrder  $bookingOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingOrder $bookingOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookingOrder  $bookingOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookingOrder $bookingOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookingOrder  $bookingOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingOrder $bookingOrder)
    {
        //
    }
}
