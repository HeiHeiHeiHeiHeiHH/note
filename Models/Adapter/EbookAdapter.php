<?php

namespace Models\Adapter;

class EbookAdapter implements BookInterface {
	protected $eBook;

	public function __construct(EbookInterface $eBook) {
		$this->eBook = $eBook;
	}

	public function open() {
		$this->eBook->unlock();
	}

	public function turnPage() {
		$this->eBook->pressNext();
	}

	public function getPage(): int {
		return $this->eBook->getPage()[0];
	}
}