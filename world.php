<?php

	function autoload($class) {
		$file = dirname(__FILE__) . '/'. strtolower($class) . '.php';
		if (file_exists($file)){
			require_once "$file";
		}
	}
	spl_autoload_register('autoload');
	$space = new Space();
	$mother = new Mother($space);

	$commander = $mother->create('commander', '', 'commander');
	$robot = $mother->create('robot', 'o1', '');
	$commander->command($robot, new Action());
?>