<?php
require 'Loader.php';
class ShopProductWriter {
	private $products = [];

	public function addProduct(ShopProduct $shopProduct)
	{
		$this->products[] = $shopProduct;
	}

	public function write(ShopProduct $shopProduct)
	{
		$str = '';
		foreach ($this->products as $product) {
			$str .= "$shopProduct->title" .
				"$shopProduct->producerMainName" .
				"$shopProduct->producerFirstName";
		}
		

		print $str;
	}
}


$product1 = new ShopProduct('蓝冰', 'Peng', 'Cao', 500);
$writer = new ShopProductWriter();
$writer->addProduct($product1);
$writer->addProduct($product1);
$writer->write($product1);

