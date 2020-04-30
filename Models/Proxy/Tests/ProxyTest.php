<?php

namespace Models\Proxy\Tests;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\Proxy\RecordProxy;
use \PHPUnit\Framework\TestCase;

class ProxyTest extends TestCase {
	public function testSetAttribute() {
		$data = [];
		$proxy = new RecordProxy($data);
		$proxy->xyz = false;

		$this->assertTrue($proxy->xyz == false);
	}
}