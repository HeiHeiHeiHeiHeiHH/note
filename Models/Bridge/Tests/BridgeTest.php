<?php

namespace Models\Bridge\Tests;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\Bridge\HelloWorldService;
use Models\Bridge\HtmlFormatter;
use Models\Bridge\PlainTextFormatter;
use \PHPUnit\Framework\TestCase;

class BridgeTest extends TestCase {
	public function testCanPrint() {
		$service = new HelloWorldService(new PlainTextFormatter());
		$this->assertEquals('Hello World', $service->get());

		$service = new HelloWorldService(new HtmlFormatter());
		$this->assertEquals('<p>Hello World</p>', $service->get());
	}
}