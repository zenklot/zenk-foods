<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;

class SnapTokenService extends Midtrans
{
	protected $order;

	public function __construct($order, $user)
	{
		parent::__construct();

		$this->order = $order;
		$this->user = $user;
	}

	public function getSnapToken()
	{
		// dd($this->order);
        $jml_meja = count(explode(',', $this->order['no_meja']));
		$params = [
			'transaction_details' => [
				'order_id' => $this->order['booking_id'],
				'gross_amount' => $this->order['total_booking'],
			],
			
			'item_details' => [
				[
					'id' => 1, // primary key produk
					'price' => '25000', // harga satuan produk
					'quantity' => $jml_meja, // kuantitas pembelian
					'name' => 'Booking Meja', // nama produk
				],
			],

			'customer_details' => [
				'first_name' => $this->user['nama_user'],
				'email' => $this->order['email_user'],
				'phone' => $this->user['no_hp'],
			]
		];

		$snapToken = Snap::getSnapToken($params);

		return $snapToken;
	}
}
