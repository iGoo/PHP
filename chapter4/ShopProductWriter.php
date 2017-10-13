<?php
// require 'Loader.php';

abstract class ShopProductWriter {
	protected $products = [];

	public function addProduct(ShopProduct $shopProduct) {
		$this->products[] = $shopProduct;
	}

	//新的抽象方法
	abstract protected function write();
}

// new ShopProductWriter;