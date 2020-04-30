<?php

namespace Models\AbstractFactory;

class ShippableProduct implements Product {
	private $productPrice;

	private $shippingCounts;

	public function __construct(int $productPrice, int $shippingCounts) {
		$this->productPrice = $productPrice;
		$this->shippingCounts = $shippingCounts;
	}

	public function calculatePrice(): int {
		return $this->productPrice * $this->shippingCounts;
	}
}