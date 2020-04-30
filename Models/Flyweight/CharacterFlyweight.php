<?php

namespace Models\Flyweight;

class CharacterFlyweight implements FlyweightInterface {
	private $name;

	public function __construct(string $name) {
		$this->name = $name;
	}

	public function render(string $font): string {
		return sprintf('Charactor %s with font %s', $this->name, $font);
	}
}