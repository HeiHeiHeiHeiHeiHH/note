<?php

namespace Models\Visitor\Tests;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\Visitor;
use \PHPUnit\Framework\TestCase;

class VisitorTest extends TestCase {
	private $visitor;

	protected function setUp() {
		$this->visitor = new Visitor\RoleVisitor();
	}

	public function provideRoles() {
		return [
			[new Visitor\User("Sefa")],
			[new Visitor\Group("Admin")],
		];
	}

	/**
	 * @dataProvider provideRoles
	 *
	 * @param \Visitor\Role $role
	 */
	public function testVisitSomeRole(Visitor\Role $role) {
		$role->accept($this->visitor);
		$this->assertSame($role, $this->visitor->getVisited()[0]);
	}
}