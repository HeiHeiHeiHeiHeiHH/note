<?php

namespace Models\Adapter;

class Book implements BookInterface {
	private $page;

	public function open() {
		$this->page = 1;
	}

	public function getPage(): int {
		return $this->page;
	}

	public function turnPage() {
		$this->page++;
	}
}