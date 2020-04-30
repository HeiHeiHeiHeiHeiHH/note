<?php

namespace Models\Delegation\Tests;

require_once __DIR__ . '/../../../vendor/autoload.php';

use Models\Delegation\JuniorDeveloper;
use Models\Delegation\TeamLead;
use \PHPUnit\Framework\TestCase;

class DelegationTest extends TestCase {
	public function testCC() {
		$JuniorDeveloper = new JuniorDeveloper();
		$leader = new TeamLead($JuniorDeveloper);

		$this->assertEquals($leader->writeCode(), $JuniorDeveloper->writeBadCode());
	}
}