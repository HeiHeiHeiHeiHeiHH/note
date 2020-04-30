<?php

namespace Models\Builder\Tests;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\Builder\CarBuilder;
use Models\Builder\Director;
use Models\Builder\Parts\Car;
use Models\Builder\Parts\Truck;
use Models\Builder\TruckBuilder;

class BuilderTest extends \PHPUnit\Framework\TestCase {
	public function testCanBuildTruck() {
		$truckBuilder = new TruckBuilder();
		$newVehicle = (new Director())->build($truckBuilder);
		$this->assertInstanceOf(Truck::class, $newVehicle);
	}

	public function testCanBuildCar() {
		$carBuilder = new CarBuilder();
		$newVehicle = (new Director())->build($carBuilder);
		$this->assertInstanceOf(Car::class, $newVehicle);
	}
}