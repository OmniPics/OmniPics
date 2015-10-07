<?php

class Request {
	public $method;
	public $links;

	public function __construct($method, $links) {
		$this->method = $method;
		$this->links = $links;
	}
}

?>
