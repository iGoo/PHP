<?php
require 'Loader.php';

class BookProduct extends ShopProduct
{
	protected $numPages;
	function __construct($title, $mainName, $firstName, $price, $numPages) {
		parent::__construct($title, $mainName, $firstName, $price);
		$this->numPages = $numPages;
	}

	public function getNumPages()
	{
		return $this->numPages;
	}

	public function getSummaryLine()
	{
		$base = "$this->title ( $this->producerMainName";
		$base .= "$this->producerFirstName )";
		$base .= ":page count - $this->numPages";

		return $base;
	}
}

$book = new BookProduct('Redis实战', 'Peng', 'Cao', 58, 203);
echo $book->getSummaryLine();


