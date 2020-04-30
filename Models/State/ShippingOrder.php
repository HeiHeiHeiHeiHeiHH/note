<?php

namespace Models\State;

class ShippingOrder extends StateOrder {
	public function __construct() {
		$this->setStatus('shipping');
	}

	public function done() {
		$this->setStatus('completed');
	}
}