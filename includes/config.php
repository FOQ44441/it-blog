<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

function debug($array)
{
	echo "<pre>";
	var_dump($array);
	echo "</pre>";
}

$config = array (
	'title' => 'Блог об IT',
	'vk_url' => 'https://vk.com/somebody',

	'db' => array(
		'server' => 'localhost',
		'username' => 'root',
		'password' => 'dshereme',
		'name' => 'test_blog'
	)
);

require_once "db.php";
?>