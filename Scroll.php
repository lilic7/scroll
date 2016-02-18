<?php
class Scroll {    
    const FILE_DEST = 'G:\\SCROLL\\scroll.txt';
    const FILE_TEMP = 'G:\\SCROLL\\temp.txt';
    private $new_content;
    private $old_content;
    
    function __construct($text) {
        $this->new_content = trim($text);
        $this->old_content = file_get_contents(self::FILE_TEMP);
    }
    
    function is_New(){
        return $this->new_content === $this->old_content ? false : true;
    }
            
    function save(){
        if($this->is_New()){
            file_put_contents(self::FILE_TEMP, $this->new_content);
            $text = $this->toUpper()->removeEmptyRows();
            //$converted = mb_convert_encoding($text, "UTF-8");
            file_put_contents(self::FILE_DEST, "\xEF\xBB\xBF".$text);
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