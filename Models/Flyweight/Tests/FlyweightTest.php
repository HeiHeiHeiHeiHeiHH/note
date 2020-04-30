<?php

namespace Models\Flyweight\Tests;

require_once __DIR__ . '/../../../vendor/autoload.php';

use Models\Flyweight\FlyweightFactory;
use \PHPUnit\Framework\TestCase;

class FlyweightTest extends TestCase {
	private $charactors = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];

	private $fonts = ['Arial', 'Times New Roman', 'Verdana', 'Helvetica'];

	public function testFlyweight() {
		$factory = new FlyweightFactory();

		foreach ($this->charactors as $charactor) {
			foreach ($this->fonts as $font) {
				$flyweight = $factory->get($charactor);
				$rendered = $flyweight->render($font);

				$this->assertEquals(sprintf('Charactor %s with font %s', $charactor, $font), $rendered);
			}
		}

		$this->assertCount(count($this->charactors), $factory);
	}
}