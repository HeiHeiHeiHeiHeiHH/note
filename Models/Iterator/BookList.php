<?php

namespace Models\Iterator;

class BookList implements \Countable, \Iterator {
	private $books = [];

	private $currentIndex = 0;

	public function addBook(Book $book) {
		$this->books[] = $book;
	}

	public function removeBook(Book $book) {
		foreach ($this->books as $key => $value) {
			if ($book->getTitleAndAuthor() === $value->getTitleAndAuthor()) {
				unset($this->books[$key]);
			}
		}

		$this->books = array_values($this->books);
	}

	public function count(): int {
		return count($this->books);
	}

	public function current(): Book {
		return $this->books[$this->currentIndex];
	}

	public function key(): int {
		return $this->currentIndex;
	}

	public function next() {
		$this->currentIndex++;
	}

	public function valid(): bool {
		return isset($this->books[$this->currentIndex]);
	}

	public function rewind() {
		$this->currentIndex = 0;
	}
}