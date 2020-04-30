<?php

namespace Models\Proxy;

class RecordProxy extends Record {
	private $isDirty = false;

	private $isInitalized = false;

	public function __construct(array $data) {
		parent::__construct($data);

		if (count($data) > 0) {
			$this->isInitalized = true;
			$this->isDirty = true;
		}
	}

	public function __set(string $name, string $value) {
		$this->isDirty = true;
		parent::__set($name, $value);
	}

	public function isDirty(): bool {
		return $this->isDirty;
	}
}