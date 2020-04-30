<?php

namespace Models\Facade\Tests;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\Facade\Facade;
use \PHPUnit\Framework\TestCase;

class Facadetest extends TestCase {
	public function testComputerOn() {
		$os = $this->createMock("Models\Facade\OsInterface");

		$os->method('getName')->will($this->returnValue('Linux'));

		$bios = $this->getMockBuilder('\Models\Facade\BiosInterface')->setMethods(['launch', 'execute', 'waitForKeyPress'])->disableAutoload()->getMock();
		$bios->expects($this->once())->method('launch')->with($os);

		$facade = new Facade($os, $bios);

		$facade->turnOn();

		$this->assertEquals('Linux', $os->getName());
	}
}