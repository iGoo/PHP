<?php
require 'Loader.php';

class User extends Domain {
	public static function create() {
		return new User;
	}
}


print_r(User::create());