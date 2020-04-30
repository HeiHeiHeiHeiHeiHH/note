<?php

namespace Models\Singleton\Tests;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\Singleton\Singleton;
use \PHPUnit\Framework\TestCase;

class SingletonTest extends TestCase {
	public function testSingleton() {
		$firstCall = Singleton::getInstance();
		$secondCall = Singleton::getInstance();

		$this->assertInstanceOf(Singleton::class, $firstCall);
		$this->assertSame($firstCall, $secondCall);
	}
}