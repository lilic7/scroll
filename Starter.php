<?php
class Starter {
    const FILE_TEMP = 'G:\\SCROLL\\temp.txt';
    private $text;
    
    function __construct() {
        $this->text = file_get_contents(self::FILE_TEMP);
    }
    
    function getText(){
        return $this->text;
    }
}