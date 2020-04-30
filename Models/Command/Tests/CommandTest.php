<?php

namespace Models\Command\Tests;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\Command\HelloCommand;
use Models\Command\Invoker;
use Models\Command\Receiver;
use \PHPUnit\Framework\TestCase;

class CommandTest extends TestCase {
	public function testHelloCommand() {
		$invoker = new Invoker();
		$receiver = new Receiver();

		$invoker->setCommand(new HelloCommand($receiver));
		$invoker->run();

		$this->assertEquals("Hello World~", $receiver->getOutput());
	}
}