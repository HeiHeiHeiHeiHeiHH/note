<?php

namespace Models\Repository;

class PostRepository {
	private $persistence;

	public function __construct(MemoryStorage $persistence) {
		$this->persistence = $persistence;
	}

	public function findById($id): Post{
		$arrayData = $this->persistence->retrieve($id);

		if (is_null($arrayData)) {
			throw new \InvalidArgumentException(sprintf('Post whid ID %d does not exists', $id));
		}

		return Post::fromState($arrayData);
	}

	public function save(Post $post) {
		$id = $this->persistence->persist(
			[
				'text' => $post->getText(),
				'title' => $post->getTitle(),
			]
		);

		$post->setId($id);
	}
}