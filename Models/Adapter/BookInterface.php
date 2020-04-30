<?php

namespace Models\Adapter;

interface BookInterface {
	public function turnPage();

	public function open();

	public function getPage();
}