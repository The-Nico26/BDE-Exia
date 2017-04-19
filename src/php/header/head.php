<?php
	class Head {
		public static $meta = "";
		public static $link = "";
		public static $title = "<title>-</title>";
		
		public function setTitle($title){
			self::$title = "<title>$title</title>";
		}
		public function addMeta($met){
			self::$meta .= $met;
		}
		public function addLink($lin){
			self::$link .= $lin;
		}
		public function getHead(){
			$var = "
			<!DOCTYPE html>
			<html>
			    <head>".
			    	self::$meta.
			    	self::$link.
			    	self::$title."
			   	</head>
			   	<body>";
			echo $var;
			return $var;
		}
		
		public function setup(){
			self::addMeta("<meta name=\"viewport\" content=\"width=device-width, user-scalable=no\">");
			self::addMeta("<meta charset=\"utf-8\">");
			self::addLink("<link rel=\"stylesheet\" type=\"text/css\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css\">");
			self::addLink("<link href=\"../css/metro.css\" rel=\"stylesheet\">");
			self::addLink("<link href=\"../css/nico.css\" rel=\"stylesheet\">");
		}
	}
	
	$head = new Head();