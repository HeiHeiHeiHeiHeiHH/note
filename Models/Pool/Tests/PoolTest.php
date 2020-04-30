<?php

namespace Models\Pool;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\Pool\WorkerPool;

class PoolTest extends \PHPUnit\Framework\TestCase {
	public function testCanGetNewInstanceWithGet() {
		$pool = new WorkerPool();
		$worker1 = $pool->get();
		$worker2 = $pool->get();

		$this->assertCount(2, $pool);
		$this->assertNotSame($worker1, $worker2);
	}

	public function testCanGetInstanceTwiceWhenDisposingItFirst() {
		$pool = new WorkerPool();
		$worker1 = $pool->get();
		$pool->dispose($worker1);
		$worker2 = $pool->get();

		$this->assertCount(1, $pool);
		$this->assertSame($worker1, $worker2);
	}
}