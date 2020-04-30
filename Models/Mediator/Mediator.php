<?php

namespace Models\Mediator;

use Models\Mediator\Sys\Client;
use Models\Mediator\Sys\Database;
use Models\Mediator\Sys\Server;

class Mediator implements MediatorInterface {
	private $server;

	private $database;

	private $client;

	public function __construct(Database $database, Client $client, Server $server) {
		$this->server = $server;
		$this->client = $client;
		$this->database = $database;

		$this->server->setMediator($this);
		$this->client->setMediator($this);
		$this->database->setMediator($this);
	}

	public function makeRequest() {
		$this->server->process();
	}

	public function queryDb(): string {
		return $this->database->getData();
	}

	public function sendResponse($content) {
		$this->client->output($content);
	}
}