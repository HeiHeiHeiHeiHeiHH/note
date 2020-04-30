<?php

namespace Models\Bridge;

abstract class Service {
	protected $implemention;

	public function __construct(FormatterInterface $formatter) {
		$this->implemention = $formatter;
	}

	public function setImplemention(FormatterInterface $formatter) {
		$this->implemention = $formatter;
	}

	abstract public function get();
}