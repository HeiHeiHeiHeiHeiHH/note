<?php

namespace Models\Observer;

class UserObserver implements \SplObserver {
	private $changeUsers = [];

	public function update(\SplSubject $subject) {
		$this->changeUsers[] = clone $subject;
	}

	public function getChangeUser(): array{
		return $this->changeUsers;
	}
}