<?php

namespace Models\Mediator\Tests;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\Mediator\Mediator;
use Models\Mediator\Sys\Client;
use Models\Mediator\Sys\Database;
use Models\Mediator\Sys\Server;
use \PHPUnit\Framework\TestCase;

class MediatorTest extends TestCase {
	public function testOutput() {
		$client = new Client();
		new Mediator(new Database(), $client, new Server());

		$this->expectOutputString("Words: You create the world of dream");
		$client->request();
	}
}