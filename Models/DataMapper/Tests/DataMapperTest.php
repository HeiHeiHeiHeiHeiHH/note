<?php

namespace Models\DataMapper\Tests;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\DataMapper\StorageAdapter;
use Models\DataMapper\User;
use Models\DataMapper\UserMapper;
use \PHPUnit\Framework\TestCase;

class DataMapperTest extends TestCase {
	public function testCanMapUserFromStorage() {
		$storage = new StorageAdapter(array(
			1 => ['username' => 'AngerFist', 'email' => 'angerfist@mof.com'],
		));

		$mapper = new UserMapper($storage);
		$user = $mapper->findId(1);

		$this->assertInstanceOf(User::class, $user);
	}

	/**
	 *@expectedException \InvalidArgumentException
	 **/
	public function testWillNotMapInvalidData() {
		$storage = new StorageAdapter([]);
		$mapper = new UserMapper($storage);

		$mapper->findId(1);
	}
}