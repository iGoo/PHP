<?php

abstract class Domain {
	public static function create() {
		return new static;
	}
}