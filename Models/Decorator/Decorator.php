<?php

namespace Models\Decorator;

abstract class Decorator implements RenderInterface {
	protected $wrapped;

	public function __construct(RenderInterface $renderer) {
		$this->wrapped = $renderer;
	}
}