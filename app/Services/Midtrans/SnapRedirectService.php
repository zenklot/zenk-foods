<?php

namespace App\Services\Midtrans;

use Exception;
use Midtrans\Snap;

class SnapRedirectService extends Midtrans {
    protected $order;
    protected $user;

	public function __construct($order, $user)
	{
		parent::__construct();

		$this->order = $order;
		$this->user = $user;
	}


    public function getSnapRedirect()
    {
        $jml_meja = count(explode(',', $this->order['no_meja']));
        $params = array(
            'transaction_details' => [
                'order_id' => $this->order['booking_id'],
                'gross_amount' => $this->order['total_booking'],
            ],

            'item_details' => [
				[
					'id' => 1, 
					'price' => '25000', 
					'quantity' => $jml_meja, 
					'name' => 'Booking Meja',
				],
			],

			'customer_details' => [
				'first_name' => $this->user['nama_user'],
				'email' => $this->order['email_user'],
				'phone' => $this->user['no_hp'],
			]
        );
        
        try {
          // Get Snap Payment Page URL
          $paymentUrl = Snap::createTransaction($params)->redirect_url;
          
          // Redirect to Snap Payment Page
        //   header('Location: ' . $paymentUrl);
          return $paymentUrl;
        }
        catch (Exception $e) {
        //   echo $e->getMessage();
          return $e->getMessage();
        }
    }


}