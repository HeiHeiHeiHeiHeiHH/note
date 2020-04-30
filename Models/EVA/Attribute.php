<?php

namespace Models\EVA;

class Attribute {
	private $name;
	private $values;

	public function __construct(string $name) {
		$this->name = $name;
		$this->value = new \SplObjectStorage();
	}

	public function addValue(Value $value) {
		$this->value->attach($value);
	}

	public function getValue(): \SplObjectStorage {
		return $this->values;
	}

	public function __toString(): string {
		return $this->name;
	}
}