<?php

namespace Models\Memento;

class Memento {
	private $state;

	public function __construct(State $state) {
		$this->state = $state;
	}

	public function getState() {
		return $this->state;
	}
}