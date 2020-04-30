<?php

namespace Models\Prototype;

abstract class BookPrototype {
	protected $title;

	protected $category;

	public function getTitle(): string {
		return $this->title;
	}

	public function setTitle(string $title) {
		$this->title = $title;
	}

	abstract public function __clone();
}