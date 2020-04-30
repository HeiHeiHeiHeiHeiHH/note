<?php

namespace Models\Delegation;

class TeamLead {
	private $junior;

	public function __construct(JuniorDeveloper $junior) {
		$this->junior = $junior;
	}

	public function writeCode(): string {
		return $this->junior->writeBadCode();
	}
}