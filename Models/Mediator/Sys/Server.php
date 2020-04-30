<?php

namespace Models\Mediator\Sys;

use Models\Mediator\Colleague;

class Server extends Colleague {
	public function process() {
		$data = $this->mediator->queryDb();
		$this->mediator->sendResponse(sprintf("Words: %s", $data));
	}
}