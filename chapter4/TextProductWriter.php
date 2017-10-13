<?php
require 'Loader.php';

class TextProductWriter extends ShopProductWriter
{
	public function write() {
		echo 'success';
	}

	public function outText() {

	}
}

$text = new TextProductWriter;
$text->write();