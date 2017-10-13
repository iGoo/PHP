<?php
require 'Loader.php';

class CdProduct extends ShopProduct
{
	protected $playLength;

	function __construct($title, $mainName, $firstName, $price, $playLength) {
		parent::__construct($title, $mainName, $firstName, $price);
		$this->playLength = $playLength;
	}

	public function getPlayLength()
	{
		return $this->playLength;
	}

	public function getSummaryLine()
	{
		$base = "$this->title ( $this->producerMainName";
		$base .= "$this->producerFirstName )";
		$base .= ":palying time - $this->playLength";

		return $base;
	}
}

$cd = new CdProduct('光年之外', '子琪', '邓', 100, 300);
echo $cd->getSummaryLine();