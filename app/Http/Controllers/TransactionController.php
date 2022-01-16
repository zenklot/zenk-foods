<?php

namespace App\Http\Controllers;

use App\Models\BookingOrder;
use App\Models\User;
use App\Services\Midtrans\NotificationService;
use App\Services\Midtrans\SnapRedirectService;
use Bavix\Wallet\Interfaces\Wallet as InterfacesWallet;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = Wallet::first();
        // dd($user);
        $booking = BookingOrder::where('email_user', auth()->user()->email)->latest()->paginate(10);
        // $user = User::with('wallet')->find(auth()->user()->email);
        // $user = User::first();
        // $balance = $user->balance;
        // dd($balance);
        return view('dashboard.transaction', ['bookings' => $booking]);
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
    public function store(Request $request)
    {
        $midtrans = new NotificationService();
        $notif = $midtrans->getNotification();
        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        if ($transaction == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $p_status = $fraud;
                    $b_status = 'pending';
                } else {
                    $p_status = $transaction;
                    $b_status = 'queue';
                }
            }
        } else if ($transaction == 'settlement') {
            $p_status = $transaction;
            $b_status = 'queue';
        } else if ($transaction == 'pending') {
            $p_status = $transaction;
            $b_status = 'accept';
        } else if ($transaction == 'deny') {
            $p_status = $transaction;
            $b_status = $transaction;
        } else if ($transaction == 'expire') {
            $p_status = $transaction;
            $b_status = $transaction;
        } else if ($transaction == 'cancel') {
            $p_status = $transaction;
            $b_status = $transaction;
        }

        $booking = BookingOrder::find($order_id);
        $booking->payment_status = $p_status;
        $booking->booking_status = $b_status;
        $booking->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $booking = BookingOrder::find($id);
        // $snapToken = $booking->snap_token;
        // if (is_null($snapToken)) {
        //     $user = User::find(auth()->user()->email)->toArray();
        //     $midtrans = new SnapTokenService($booking, $user);
        //     $snapToken = $midtrans->getSnapToken();
        //     $booking->snap_token = $snapToken;
        //     $booking->save();
        // }

        // return view('dashboard.transaction-detail', ['booking' => $booking]);

        $booking = BookingOrder::find($id);
        $user = User::find(auth()->user()->email)->toArray();
        $midtrans = new SnapRedirectService($booking, $user);
        $url = $midtrans->getSnapRedirect();
        try {
            return redirect($url);
        } catch (\Throwable $th) {
            dd($url);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
