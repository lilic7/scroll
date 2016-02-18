<?php
class Config{
	private $ini;
	
	function __construct(){
		$this->ini = parse_ini_file("config.ini");
	}
	
	
}