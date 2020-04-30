<?php

namespace Models\Builder;

use Models\Builder\Parts\Vehicle;

/**
 * director类是建造者模式的一部分。它可以实现建造者模式的接口
 * 并在构建器的帮助下构建一个复杂的类.
 *
 * 可以注入许多构建器而不是构建更复杂的对象
 **/
class Director {
	public function build(BuilderInterface $builder): Vehicle{
		$builder->createVehicle();
		$builder->addDoors();
		$builder->addEngine();
		$builder->addWheel();

		return $builder->getVehicle();
	}
}