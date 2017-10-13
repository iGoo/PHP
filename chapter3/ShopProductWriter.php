<?php
require 'ShopProduct.php';
class ShopProductWriter {
	public function write(ShopProduct $shopProduct)
	{
		$str = "$shopProduct->title" .
				"$shopProduct->producerMainName" .
				"$shopProduct->producerFirstName";

		print $str;
	}
}


$product1 = new ShopProduct('蓝冰', 'Peng', 'Cao', 500);
$writer = new ShopProductWriter();
$writer->write($product1);
