<?php

namespace Models\Specification;

class OrSpecification implements SpecificationInterface {
	private $specifications;

	public function __construct(SpecificationInterface...$specifications) {
		$this->specifications = $specifications;
	}

	public function isStatisfiedBy(Item $item): bool {
		foreach ($this->specifications as $specification) {
			if ($specification->isStatisfiedBy($item)) {
				return true;
			}
		}

		return false;
	}
}