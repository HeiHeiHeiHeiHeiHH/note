<?php

namespace Models\Facade;

interface BiosInterface {
	public function execute();

	public function waitForKeyPress();

	public function launch(IoInterface $io);

	public function powerDown();
}