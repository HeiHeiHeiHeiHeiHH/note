<?php

namespace Models\Register;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\Register\Registry;
use \PHPUnit\Framework\TestCase;
use \stdClass;

class RegisterTest extends TestCase {
	public function testSetAndGetLogger() {
		$key = Registry::LOGGER;
		$logger = new stdClass();

		Registry::set($key, $logger);
		$storedLogger = Registry::get($key);

		$this->assertSame($storedLogger, $logger);
		$this->assertInstanceOf(stdClass::class, $storedLogger);
	}

	/**
	 * @expectedException \InvalidArgumentException
	 **/
	public function testThrowsExceptionWhenTryingToSetInvalidKey() {
		Registry::set("fuck", new stdClass());
	}
}