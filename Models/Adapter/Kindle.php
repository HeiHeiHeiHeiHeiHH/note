<?php

namespace Models\Adapter;

class Kindle implements EbookInterface {
	private $page = 1;

	private $totalPages = 100;

	public function unlock() {

	}

	public function pressNext() {
		$this->page++;
	}

	public function getPage(): array{
		return array($this->page, $this->totalPages);
	}
}