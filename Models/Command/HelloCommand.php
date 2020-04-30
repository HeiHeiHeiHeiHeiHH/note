<?php

namespace Models\Command;

class HelloCommand implements CommandInterface {
	private $output;

	public function __construct(Receiver $output) {
		$this->output = $output;
	}

	public function execute() {
		$this->output->write("Hello World~");
	}
}