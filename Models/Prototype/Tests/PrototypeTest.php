<?php

namespace Models\Prototype\Tests;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\Prototype\BarBookPrototype;
use Models\Prototype\FooBookPrototype;
use \PHPUnit\Framework\TestCase;

class PrototypeTest extends TestCase {
	public function testCanGetFooBooks() {
		$fooBooks = new FooBookPrototype();

		for ($i = 0; $i < 10; $i++) {
			$book = clone $fooBooks;
			$book->setTitle("Foo Book No " . $i);
			$this->assertInstanceOf(FooBookPrototype::class, $book);
		}
	}

	public function testCanGetBarBooks() {
		$barBooks = new BarBookPrototype();

		for ($i = 0; $i < 10; $i++) {
			$book = clone $barBooks;
			$book->setTitle("Bar Book No " . $i);
			$this->assertInstanceOf(BarBookPrototype::class, $book);
		}
	}
}
