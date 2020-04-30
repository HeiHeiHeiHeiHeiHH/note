<?php

namespace Models\Composite;

class TextElement implements RenderInterface {
	protected $text;

	public function __construct(string $text) {
		$this->text = $text;
	}

	public function render(): string {
		return $this->text;
	}
}