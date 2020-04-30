<?php

namespace Models\DependencyInjection\Tests;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\DependencyInjection\DatabaseConfiguration;
use Models\DependencyInjection\DatabaseConnection;
use \PHPUnit\Framework\TestCase;

class DependencyInjection extends TestCase {
	public function testDependencyInjection() {
		$config = new DatabaseConfiguration('127.0.0.1', 3306, 'suidaiyu', '226198');
		$connection = new DatabaseConnection($config);

		$this->assertEquals('suidaiyu:226198@127.0.0.1:3306', $connection->getDsn());
	}
}
