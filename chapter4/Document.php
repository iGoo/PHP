<?php
require 'Loader.php';

class Document extends Domain {
	public static function create() {
		return new self;
	}
}

print_r(Document::create());