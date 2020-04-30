<?php

namespace Models\StaticFactory\Tests;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\StaticFactory\FormatNumber;
use Models\StaticFactory\FormatString;
use Models\StaticFactory\StaticFactory;
use \PHPUnit\Framework\TestCase;

class StaticFactoryTest extends TestCase {
	public function testCanCreateFormatString() {
		$this->assertInstanceOf(FormatString::class, StaticFactory::factory("string"));
	}

	public function testCanCreateFormatNumber() {
		$this->assertInstanceOf(FormatNumber::class, StaticFactory::factory("number"));
	}

	/**
	 * @expectedException \InvalidArgumentException
	 **/
	public function testExcept() {
		StaticFactory::factory("syi");
	}
}