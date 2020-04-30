<?php

namespace Models\Memento;

class State {
	const STATE_CREATED = 'created';
	const STATE_OPENED = 'opened';
	const STATE_ASSIGNED = 'assigned';
	const STATE_CLOSED = 'closed';

	private $state;

	private static $validStates = [
		self::STATE_CLOSED,
		self::STATE_ASSIGNED,
		self::STATE_OPENED,
		self::STATE_CREATED,
	];

	public function __construct(string $state) {
		self::ensureValidState($state);

		$this->state = $state;
	}

	private static function ensureValidState($state) {
		if (!in_array($state, self::$validStates)) {
			throw new \InvalidArgumentException("Invalid state given");
		}
	}

	public function __toString(): string {
		return $this->state;
	}
}