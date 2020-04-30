<?php

namespace Models\AbstractFactory;

class ProductFactory {
	const SHIPPING_COUNTS = 50;

	public function createShippableProduct(int $price): Product {
		return new ShippableProduct($price, self::SHIPPING_COUNTS);
	}

	public function createDigitalProduct(int $price): Product {
		return new DigitalProduct($price);
	}
}