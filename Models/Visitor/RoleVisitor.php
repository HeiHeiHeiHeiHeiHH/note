<?php

namespace Models\Visitor;

class RoleVisitor implements RoleVisitorInterface {
	private $visited = [];

	public function visitUser(User $role) {
		$this->visited[] = $role;
	}

	public function visitGroup(Group $role) {
		$this->visited[] = $role;
	}

	public function getVisited(): array{
		return $this->visited;
	}
}