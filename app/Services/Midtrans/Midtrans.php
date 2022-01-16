<?php

namespace App\Services\Midtrans;

use Midtrans\Config;

class Midtrans {
	protected $serverKey;
	protected $isProduction;
	protected $isSanitized;
	protected $is3ds;
	protected $overrideNotifUrl;

	public function __construct()
	{
		$this->serverKey = config('midtrans.server_key');
		$this->isProduction = config('midtrans.is_production');
		$this->isSanitized = config('midtrans.is_sanitized');
		$this->is3ds = config('midtrans.is_3ds');
		$this->overrideNotifUrl = config('midtrans.override_notif_url');
		$this->_configureMidtrans();
	}

	public function _configureMidtrans()
	{
		Config::$serverKey = $this->serverKey;
		Config::$isProduction = $this->isProduction;
		Config::$isSanitized = $this->isSanitized;
		Config::$is3ds = $this->is3ds;
		Config::$overrideNotifUrl = $this->overrideNotifUrl;
	}
}