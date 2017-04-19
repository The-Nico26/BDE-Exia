<?php
	include_once 'server.php';
	abstract class item
	{
		abstract static function find(... $params);
		abstract static function remove($variable);
		abstract static function update($variable);
	}