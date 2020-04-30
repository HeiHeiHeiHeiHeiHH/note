<?php

namespace Models\State;

class CreateOrder extends StateOrder {
	public function __construct() {
		$this->setStatus('created');
	}

	public function done() {
		static::$state = new ShippingOrder();
	}
}