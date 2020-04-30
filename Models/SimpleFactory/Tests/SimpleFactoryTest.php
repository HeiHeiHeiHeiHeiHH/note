<?php

namespace Models\SimpleFactory;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\SimpleFactory\Bicyle;
use Models\SimpleFactory\SimpleFactory;
use \PHPUnit\Framework\TestCase;

class SimpleFactoryTest extends TestCase {
	public function testCanCreateBicyle() {
		$bicyle = (new SimpleFactory())->createBicyle();
		$this->assertInstanceOf(Bicyle::class, $bicyle);
	}
}