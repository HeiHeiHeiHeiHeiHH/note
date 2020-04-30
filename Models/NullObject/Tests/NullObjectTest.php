<?php

namespace Models\NullObject\Tests;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\NullObject\NullLogger;
use Models\NullObject\PrintLogger;
use Models\NullObject\Service;
use \PHPUnit\Framework\TestCase;

class NullObjectTest extends TestCase {
	public function testNullObject() {
		$service = new Service(new NullLogger());
		$this->expectOutputString("");
		$service->doSomething();
	}

	public function testPrintObject() {
		$service = new Service(new PrintLogger());
		$this->expectOutputString('We are in Models\NullObject\Service::doSomething');
		$service->doSomething();
	}
}