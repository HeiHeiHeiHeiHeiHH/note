<?php

namespace Models\Pool;

class WorkerPool implements \Countable {
	private $occupieWorkers = [];

	private $freeWorkers = [];

	public function get(): StringReverseWorker {
		if (count($this->freeWorkers) == 0) {
			$worker = new StringReverseWorker();
		} else {
			$worker = array_pop($this->freeWorkers);
		}

		$this->occupieWorkers[spl_object_hash($worker)] = $worker;

		return $worker;
	}

	public function dispose(StringReverseWorker $worker) {
		$key = spl_object_hash($worker);

		if (isset($this->occupieWorkers[$key])) {
			unset($this->occupieWorkers[$key]);
			$this->freeWorkers[$key] = $worker;
		}
	}

	public function count(): int {
		return count($this->occupieWorkers) + count($this->freeWorkers);
	}
}