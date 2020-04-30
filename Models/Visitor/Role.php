<?php

namespace Models\Visitor;

interface Role {
	public function accept(RoleVisitorInterface $visitor);
}