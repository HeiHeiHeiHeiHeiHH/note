<?php

namespace Models\ChainOfResponsibilites\Tests;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\ChainOfResponsibilities\FastStorage;
use Models\ChainOfResponsibilities\SlowStorage;
use \PHPUnit\Framework\TestCase;

class ChainOfResponsibilitiesTest extends TestCase {
	private $chain;

	protected function setUp() {
		$this->chain = new FastStorage(['/foo/bar?index=1' => 'Hello In Memory'], new SlowStorage());
	}

	public function testCanRequestKeyInFastStorage() {
		$uri = $this->createMock('Psr\Http\Message\UriInterface');
		$uri->method('getPath')->willReturn('/foo/bar');
		$uri->method('getQuery')->willReturn('index=1');

		$request = $this->createMock('Psr\Http\Message\RequestInterface');
		$request->method('getMethod')->willReturn('GET');
		$request->method('getUri')->willReturn($uri);

		$this->assertEquals('Hello In Memory', $this->chain->Handle($request));
	}

	public function testCanRequestKeyInSlowStorage() {
		$uri = $this->createMock('Psr\Http\Message\UriInterface');
		$uri->method('getPath')->willReturn('/foo/baz');
		$uri->method('getQuery')->willReturn('');

		$request = $this->createMock('Psr\Http\Message\RequestInterface');
		$request->method('getMethod')->willReturn('GET');
		$request->method('getUri')->willReturn($uri);

		$this->assertEquals('Hello World!', $this->chain->handle($request));
	}

}