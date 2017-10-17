<?php

abstract class Domain
{
	private $group;

	function __construct() {
		$this->group = static::getGroup();
	}

	public static function create() {
		return new static;
	}

	// 基类提供了默认实现，子类可以根据情况自己扩展
	public static function getGroup() {
		return 'default-group';
	}
}