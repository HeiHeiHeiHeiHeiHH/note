<?php

namespace Models\TemplateMethod\Tests;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\TemplateMethod\BeachJourney;
use Models\TemplateMethod\CityJourney;
use \PHPUnit\Framework\TestCase;

class TemplateMethodTest extends TestCase {
	public function testCanBenchJourney() {
		$journey = new BeachJourney();
		$journey->takeATrip();

		$this->assertEquals(
			[
				'Buy a fight ticket',
				'Taking the plane',
				'Swimming and sun-bathing',
				'Taking the plane',
			],
			$journey->getThingsToDo()
		);
	}

	public function testCanCityJourney() {
		$journey = new CityJourney();
		$journey->takeATrip();

		$this->assertEquals(
			[
				'Buy a fight ticket',
				'Taking the plane',
				'Eat, drink, take photos and sleep',
				'Buy a gift',
				'Taking the plane',
			],
			$journey->getThingsToDo()
		);
	}

}