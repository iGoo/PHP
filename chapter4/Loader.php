<?php
// 加载器
// 
function __autoload($classname) {
	require $classname . '.php';
}