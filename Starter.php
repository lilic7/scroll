<?php
include_once 'Config.php';;
class Starter {
    const FILE_TEMP = 'G:\\SCROLL\\temp.txt';
    private $text;
    
    private $config;
    
    function __construct() {
        $this->config = new Config();
        $this->text = file_get_contents($this->config->temp_file());
    }
    
    function getText(){
        return $this->text;
    }
}