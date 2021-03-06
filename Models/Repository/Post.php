<?php

namespace Models\Repository;

class Post {
	private $id;
	private $title;
	private $text;

	public static function fromState(array $state): Post {
		return new self($state['id'], $state['title'], $state['text']);
	}

	public function __construct($id, string $title, string $text) {
		$this->id = $id;
		$this->title = $title;
		$this->text = $text;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getId() {
		return $this->id;
	}

	public function getTitle(): string {
		return $this->title;
	}

	public function getText(): string {
		return $this->text;
	}

}