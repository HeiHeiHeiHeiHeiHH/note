<?php

namespace Models\DataMapper;

class UserMapper {
	private $adapter;

	public function __construct(StorageAdapter $adapter) {
		$this->adapter = $adapter;
	}

	public function findId(int $uid): User{
		$result = $this->adapter->find($uid);

		if (!$result) {
			throw new \InvalidArgumentException("User #$uid not find");
		}

		return $this->mapRowToUser($result);
	}

	private function mapRowToUser(array $row): User {
		return User::formatState($row);
	}
}