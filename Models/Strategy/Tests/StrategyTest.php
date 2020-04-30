<?php

namespace Models\Strategy\Tests;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\Strategy\Context;
use Models\Strategy\DateComparator;
use Models\Strategy\IdComparator;
use \PHPUnit\Framework\TestCase;

class StrategyTest extends TestCase {
	public function provideIntegers() {
		return [
			[
				[['id' => 2], ['id' => 1], ['id' => 3]],
				['id' => 1],
			],
			[
				[['id' => 3], ['id' => 2], ['id' => 1]],
				['id' => 1],
			],
		];
	}

	public function provideDates() {
		return [
			[
				[['date' => '2014-03-03'], ['date' => '2015-03-02'], ['date' => '2013-03-01']],
				['date' => '2013-03-01'],
			],
			[
				[['date' => '2014-02-03'], ['date' => '2013-02-01'], ['date' => '2015-02-02']],
				['date' => '2013-02-01'],
			],

		];
	}

	/**
	 * @dataProvider provideIntegers
	 *
	 * @param array $collection
	 * @param array $exception
	 */
	public function testIdComparator($collection, $expected) {
		$obj = new Context(new IdComparator());
		$elements = $obj->executeStrategy($collection);

		$firstElement = array_shift($elements);
		$this->assertEquals($expected, $firstElement);
	}

	/**
	 * @dataProvider provideDates
	 *
	 * @param array $collection
	 * @param array $expected
	 */
	public function testDateComparator($collection, $expected) {
		$obj = new Context(new DateComparator());
		$elements = $obj->executeStrategy($collection);

		$firstElement = array_shift($elements);
		$this->assertEquals($expected, $firstElement);
	}
}