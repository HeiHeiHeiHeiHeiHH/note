<?php

namespace Models\FluentInterface\Tests;

require_once __DIR__ . "/../../../vendor/autoload.php";

use Models\FluentInterface\Sql;
use \PHPUnit\Framework\TestCase;

class SqlTest extends TestCase {
	public function testBuildSql() {
		$query = (new Sql())
			->select(['foo', 'core'])
			->from('foobar', "f")
			->where('f.bar = ?');

		$this->assertEquals("SELECT foo, core FROM foobar AS f WHERE f.bar = ?", (string) $query);
	}
}