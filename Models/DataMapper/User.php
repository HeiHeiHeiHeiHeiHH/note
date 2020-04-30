<?php

namespace Models\DataMapper;

class User {
	private $username;

	private $email;

	public static function formatState(array $state): User {
		return new self($state['username'], $state['email']);
	}

	public function getUsername(): string {
		return $this->username;
	}

	public function getEmail(): string {
		return $this->email;
	}

	public function __construct(string $username, string $email) {
		$this->username = $username;
		$this->email = $email;
	}
}