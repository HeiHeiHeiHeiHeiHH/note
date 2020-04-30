<?php

namespace Models\Observer\Tests;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\Observer\User;
use Models\Observer\UserObserver;
use \PHPUnit\Framework\TestCase;

class ObserverTest extends TestCase {
	public function testXXX() {
		$observer = new UserObserver();
		$user = new User();

		$user->attach($observer);

		$user->changeEmail("461099652@qq.com");
		$user->changeEmail("15928634421@163.com");
		$this->assertCount(2, $observer->getChangeUser());
	}
}