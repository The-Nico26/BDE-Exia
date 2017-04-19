<?php
	include_once 'server.php';
	abstract class item
	{
		abstract protected function find(... $params);
		abstract protected function remove($variable);
		abstract protected function update($variable);
	}