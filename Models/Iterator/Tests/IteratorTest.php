<?php

namespace Models\Iterator;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\Iterator\Book;
use Models\Iterator\BookList;
use \PHPUnit\Framework\TestCase;

class IteratorTest extends TestCase {
	public function testCanIteratorOverBookList() {
		$bookList = new BookList();
		$bookList->addBook(new Book('九州飘渺录', '江南'));
		$bookList->addBook(new Book('雪中焊刀行', '烽火戏诸侯'));
		$bookList->addBook(new Book('将夜', '猫腻'));

		$books = [];

		foreach ($bookList as $value) {
			$books[] = $value->getTitleAndAuthor();
		}

		$this->assertEquals(
			[
				'九州飘渺录 by 江南',
				'雪中焊刀行 by 烽火戏诸侯',
				'将夜 by 猫腻',
			],
			$books
		);
	}

	public function testCanIteratorOverBookListAfterRemovingBook() {
		$book = new Book('神墓', '辰东');
		$book2 = new Book('神探伽利略', '东野圭吾');

		$bookList = new BookList();
		$bookList->addBook($book);
		$bookList->addBook($book2);
		$bookList->removeBook($book);

		$books = [];
		foreach ($bookList as $value) {
			$books[] = $value->getTitleAndAuthor();
		}

		$this->assertEquals(
			[
				'神探伽利略 by 东野圭吾',
			],
			$books
		);
	}

	public function testCanAddBookList() {
		$book = new Book("仙逆", "耳根");

		$bookList = new BookList();
		$bookList->addBook($book);

		$this->assertCount(1, $bookList);
	}

	public function testCanRemoveBookFromBookList() {
		$bool = new Book("盘龙", "我是西红柿");

		$bookList = new BookList();
		$bookList->addBook($bool);
		$bookList->removeBook($bool);

		$this->assertCount(0, $bookList);
	}
}