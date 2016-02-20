<?php
class Config{
	private $ini;
	
	function __construct(){
            $this->ini = parse_ini_file("config.ini");
	}
	
	function scroll_file(){
            return $this->ini['scroll'];
        }
        
        function temp_file(){
            return $this->ini['temp'];
        }
}