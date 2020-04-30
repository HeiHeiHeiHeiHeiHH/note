<?php

namespace Models\Repository\Tests;

require_once __DIR__ . '/../../../vendor/autoload.php';

use Models\Repository\MemoryStorage;
use Models\Repository\Post;
use Models\Repository\PostRepository;
use \PHPUnit\Framework\TestCase;

class RepositoryTest extends TestCase {
	public function testCanPersistAndFindPost() {
		$repository = new PostRepository(new MemoryStorage());
		$post = new Post(null, 'Repository Pattern', 'Design Patterns PHP');

		$repository->save($post);

		$this->assertEquals(1, $post->getId());
		$this->assertEquals($post->getId(), $repository->findById(1)->getId());
	}
}