<?php

namespace Models\State\Tests;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\State\ContextOrder;
use Models\State\CreateOrder;
use Models\State\ShippingOrder;
use \PHPUnit\Framework\TestCase;

class StateTest extends TestCase {
	public function testCanShipCreateOrder() {
		$order = new CreateOrder();
		$contextOrder = new ContextOrder();
		$contextOrder->setState($order);
		$contextOrder->done();

		$this->assertEquals('shipping', $contextOrder->getStatus());
	}

	public function testCanCompleteShippingOrder() {
		$order = new ShippingOrder();
		$contextOrder = new ContextOrder();
		$contextOrder->setState($order);
		$contextOrder->done();

		$this->assertEquals('completed', $contextOrder->getStatus());
	}

}