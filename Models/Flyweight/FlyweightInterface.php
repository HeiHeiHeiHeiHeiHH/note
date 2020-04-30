<?php

namespace Models\Flyweight;

interface FlyweightInterface {
	public function render(string $extrinsicState): string;
}