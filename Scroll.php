<?php
include_once 'Config.php';
class Scroll {
    private $new_content;
    private $old_content;
    
    private $config;
    
    function __construct($text) {
        $this->config = new Config();
        $this->new_content = trim($text);
        $this->old_content = file_get_contents($this->config->temp_file());
    }
    
    function is_New(){
        return $this->new_content === $this->old_content ? false : true;
    }
            
    function save(){
        if($this->is_New()){
            file_put_contents($this->config->temp_file(), $this->new_content);
            $text = $this->toUpper()->removeEmptyRows();
            //$converted = mb_convert_encoding($text, "UTF-8");
            file_put_contents($this->config->scroll_file(), "\xEF\xBB\xBF".$text);
            return true;
        }else{
            return false;
        }            
    }
    
    private function removeEmptyRows(){
        $temp = str_replace(["\r\n\r\n\r\n", "\r\n\r\n"], "\r\n", $this->new_content);
        return str_replace("\r\n", "\r\n *** ", $temp);
    }
            
    private function toUpper(){
        $diacricics = [
            "ș" => "Ș",
            "ț" => "Ț",
            "ă" => "Ă",
            "î" => "Î",
            "â" => "Â"
            ];
        $text = strtoupper($this->new_content);
        foreach ($diacricics as $small => $big) {
            $text = str_replace($small, $big, $text);
        }
        $this->new_content = $text;
        return $this;
    }
}