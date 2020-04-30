<?php

namespace Models\Decorator\Tests;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\Decorator;
use \PHPUnit\Framework\TestCase;

class DecoratorTest extends TestCase {
	private $service;

	protected function setUp() {
		$this->service = new Decorator\WebService('foobar');
	}

	public function testJsonRender() {
		$service = new Decorator\RenderJson($this->service);

		$this->assertEquals('"foobar"', $service->renderData());
	}

	public function testXmlRender() {
		$service = new Decorator\RenderXml($this->service);

		$this->assertXmlStringEqualsXmlString(
			'<?xml version="1.0"?><content>foobar</content>', $service->renderData()
		);
	}
}