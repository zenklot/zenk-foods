<?php

return [
    'mercant_id' => env('MIDTRANS_MERCHAT_ID'),
	'client_key' => env('MIDTRANS_CLIENT_KEY'),
	'server_key' => env('MIDTRANS_SERVER_KEY'),

	'is_production' => false,
	'is_sanitized' => false,
	'is_3ds' => false,
	'override_notif_url' => env('PAYMENT_NOTIF_URL')
];