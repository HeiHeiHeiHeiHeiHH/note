<?php

namespace Models\EVA\Tests;

require_once __DIR__ . '/../../../vendor/autoload.php';

use Models\EVA\Attribute;
use Models\EVA\Entity;
use Models\EVA\Value;
use \PHPUnit\Framework\TestCase;

class EVATest extends TestCase {
	public function testEVA() {
		$colorAttribute = new Attribute('color');
		$colorSilver = new Value($colorAttribute, 'silver');
		$colorBlack = new Value($colorAttribute, 'black');

		$memoryAttribute = new Attribute('memory');
		$memory8Gb = new Value($memoryAttribute, '8GB');

		$entity = new Entity('MacBook Pro', [$colorSilver, $colorBlack, $memory8Gb]);
		$this->assertEquals('MacBook Pro, color: silver, color: black, memory: 8GB', (string) $entity);
	}
}