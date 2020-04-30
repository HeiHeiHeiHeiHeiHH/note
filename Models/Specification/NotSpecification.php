<?php

namespace Models\Specification;

class NotSpecification implements SpecificationInterface {
	private $specification;

	public function __construct(SpecificationInterface $specification) {
		$this->specification = $specification;
	}

	public function isStatisfiedBy(Item $item): bool {
		return !$this->specification->isStatisFiedBy($item);
	}
}