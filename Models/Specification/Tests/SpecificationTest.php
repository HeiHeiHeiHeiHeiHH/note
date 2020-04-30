<?php

namespace Models\Specification\Tests;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\Specification\AndSpecification;
use Models\Specification\Item;
use Models\Specification\NotSpecification;
use Models\Specification\OrSpecification;
use Models\Specification\PriceSpecification;
use \PHPUnit\Framework\TestCase;

class SpecificationTest extends TestCase {
	public function testCanOr() {
		$spec1 = new PriceSpecification(50, 99);
		$spec2 = new PriceSpecification(101, 200);

		$orSpecification = new OrSpecification($spec1, $spec2);
		$this->assertFalse($orSpecification->isStatisfiedBy(new Item(100)));
		$this->assertTrue($orSpecification->isStatisfiedBy(new Item(51)));
		$this->assertTrue($orSpecification->isStatisfiedBy(new Item(150)));
	}

	public function testCanAnd() {
		$spec1 = new PriceSpecification(50, 100);
		$spec2 = new PriceSpecification(80, 200);

		$andSpecification = new AndSpecification($spec1, $spec2);
		$this->assertFalse($andSpecification->isStatisfiedBy(new Item(150)));
		$this->assertFalse($andSpecification->isStatisfiedBy(new Item(1)));
		$this->assertFalse($andSpecification->isStatisfiedBy(new Item(51)));
		$this->assertTrue($andSpecification->isStatisfiedBy(new Item(100)));
	}

	public function testCanNot() {
		$spe = new PriceSpecification(50, 100);
		$notSpec = new NotSpecification($spe);

		$this->assertFalse($notSpec->isStatisfiedBy(new Item(50)));
		$this->assertTrue($notSpec->isStatisfiedBy(new Item(150)));
	}
}