<?php

namespace Models\ServiceLocator\Tests;

require_once __DIR__ . '/../../../vendor/autoload.php';

use Models\ServiceLocator\LogService;
use Models\ServiceLocator\ServiceLocator;
use \PHPUnit\Framework\TestCase;

class ServiceLocatorTest extends TestCase {
	private $serviceLocator;

	protected function setUp() {
		$this->serviceLocator = new ServiceLocator();
	}

	public function testHasService() {
		$this->serviceLocator->addInstance(LogService::class, new LogService());

		$this->assertTrue($this->serviceLocator->has(LogService::class));
		$this->assertFalse($this->serviceLocator->has(self::class));
	}

	public function testWill() {
		$this->serviceLocator->addClass(LogService::class, []);

		$logger = $this->serviceLocator->get(LogService::class);
		$this->assertInstanceOf(LogService::class, $logger);
	}
}