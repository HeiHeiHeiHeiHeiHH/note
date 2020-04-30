<?php

namespace Models\FactoryMethod\Tests;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\FactoryMethod\FileLogger;
use Models\FactoryMethod\FileLoggerFactory;
use Models\FactoryMethod\StdoutLogger;
use Models\FactoryMethod\StdoutLoggerFactory;

class FactoryMethodTest extends \PHPUnit\Framework\TestCase {
	public function testCanCreateStdoutLogging() {
		$loggerFactory = new StdoutLoggerFactory();
		$logger = $loggerFactory->createLogger();
		$this->assertInstanceOf(StdoutLogger::class, $logger);
	}

	public function testCanCreateFileLogging() {
		$loggerFactory = new FileLoggerFactory(sys_get_temp_dir());
		$logger = $loggerFactory->createLogger();
		$this->assertInstanceOf(FileLogger::class, $logger);
	}
}