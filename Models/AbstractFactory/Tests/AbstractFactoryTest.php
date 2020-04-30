<?php
namespace Models\AbstractFactory\Tests;

require __DIR__ . "/../../../vendor/autoload.php";

use Models\AbstractFactory\DigitalProduct;
use Models\AbstractFactory\ProductFactory;
use Models\AbstractFactory\ShippableProduct;

class AbstractFactoryTest extends \PHPUnit\Framework\TestCase {
	public function testCanCreateDigitalProduct() {
		$factory = new ProductFactory();
		$product = $factory->createDigitalProduct(150);
		$this->assertInstanceOf(DigitalProduct::class, $product);
	}

	public function testCanCreateShippableProduct() {
		$factory = new ProductFactory();
		$product = $factory->createShippableProduct(150);
		$this->assertInstanceOf(ShippableProduct::class, $product);
	}

	public function testCanCalculatePriceForDigital() {
		$factory = new ProductFactory();
		$product = $factory->createDigitalProduct(150);
		$this->assertEquals(150, $product->calculatePrice());
	}

	public function testCanCalculatePriceForShippable() {
		$factory = new ProductFactory();
		$product = $factory->createShippableProduct(150);
		$this->assertEquals(150 * 50, $product->calculatePrice());
	}
}
