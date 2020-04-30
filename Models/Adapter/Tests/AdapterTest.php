<?php

namespace Models\Adapter\Tests;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\Adapter\Book;
use Models\Adapter\EbookAdapter;
use Models\Adapter\Kindle;
use \PHPUnit\Framework\TestCase;

class AdapterTest extends TestCase {
	public function testCanTurnPageOnBook() {
		$book = new Book();
		$book->open();
		$book->turnPage();

		$this->assertEquals(2, $book->getPage());
	}

	public function testCanTurnPageOnKinldeLikeInANormalBook() {
		$kindle = new Kindle();
		$book = new EbookAdapter($kindle);
		$book->open();
		$book->turnPage();

		$this->assertEquals(2, $book->getPage());
	}
}