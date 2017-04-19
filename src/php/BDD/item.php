<?php
	include_once 'server.php';
	interface item
	{
		static function find(... $params);
		static function remove($variable);
		static function update($variable);
	}