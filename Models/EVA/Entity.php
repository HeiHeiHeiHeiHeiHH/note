<?php

namespace Models\EVA;

class Entity {
	private $value;

	private $name;

	public function __construct(string $name, $values) {
		$this->name = $name;
		$this->value = new \SplObjectStorage();

		foreach ($values as $value) {
			$this->value->attach($value);
		}
	}

	public function __toString(): string{
		$text = [$this->name];

		foreach ($this->value as $value) {
			$text[] = (string) $value;
		}

		return join(', ', $text);
	}

}