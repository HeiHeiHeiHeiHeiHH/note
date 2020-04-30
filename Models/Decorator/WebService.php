<?php

namespace Models\Decorator;

class WebService implements RenderInterface {
	private $data;

	public function __construct(string $data) {
		$this->data = $data;
	}

	public function renderData(): string {
		return $this->data;
	}
}