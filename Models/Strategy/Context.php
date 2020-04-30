<?php

namespace Models\Strategy;

class Context {
	private $comparator;

	public function __construct(ComparaInterface $comparator) {
		$this->comparator = $comparator;
	}

	public function executeStrategy(array $elements): array{
		uasort($elements, [$this->comparator, "compare"]);

		return $elements;
	}

}