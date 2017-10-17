<?php
require 'Loader.php';

class Document extends Domain {
	public static function getGroup() {
		return 'document-group';
	}
}

class SpreadSheet extends Document
{

}
print_r(SpreadSheet::create());