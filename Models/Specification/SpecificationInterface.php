<?php

namespace Models\Specification;

interface SpecificationInterface {
	public function isStatisfiedBy(Item $item): bool;
}