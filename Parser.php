<?php

class Parser {
    const FILE_SOURCE = "//STORAGE-SERVER/storage/EMISIA/SCROLLS/scrolls.txt";
    const FILE_DEST = 'c:\\lilic\\scroll_dest\\scroll.txt';
    const FILE_TEMP = 'c:\\lilic\\scroll_dest\\temp.txt';
    private $text;
    private $err_message;

    public function checkFiles(){
        $files = [self::FILE_SOURCE, self::FILE_DEST, self::FILE_TEMP];
        foreach($files as $file){
            echo "$file STATUS - ";
            if(is_file($file)){
                echo "OK<br>";
            }else{
                echo "NOT FOUND!<br>";
            }
        }
        echo "<hr>";
    }

    function saveScroll($text){
        $this->text = trim($text);
        $oldContent = file_get_contents(self::FILE_TEMP);
        
        if(!$this->text){
            echo "Error: : : : :";
            $this->err_message  = "Eroare la incarcarea contentului!<br />";
            return NULL;
        }

            if ($this->text === $oldContent) {
                echo "Warnning: : : : : Continutul nu a fost modificat";
                return NULL;
            }
        else {
            file_put_contents(self::FILE_TEMP, $this->text);

            //$this->modify($content);
            $this->writeToFile();
            return $this->text;
        }
    }

    public function getUpdate(){
        $this->text = file_get_contents(self::FILE_SOURCE);
        $oldContent = file_get_contents(self::FILE_TEMP);

        if(!$this->text){
            echo "Error: : : : :";
            $this->err_message  = "Eroare la incarcarea contentului!<br />";
            return NULL;
        }

            if ($this->text === $oldContent) {
                echo "Warnning: : : : : Continutul nu a fost modificat";
                return NULL;
            }
        else {
            file_put_contents(self::FILE_TEMP, $this->text);

            //$this->modify($content);
            $this->writeToFile();
            return $this->text;
        }
    }
	
	/*
	public function getUpdate(){
        
		try {
			$xml = simplexml_load_file(self::URL);
		}
		catch (Exception $e) {
			echo "Error: : : : :";// . $e->getMessage();
		}
		if (isset($xml)) {
			$str = (string)$xml->res[0]['value'];
			if ($str != "") {
				$this->update = $this->trimText($str);
				$this->writeToFile();
			}
			else { echo "NU EXISTA TEXT!"; }
			return $str;
		}
		else {
			$this->err_message  = "Eroare la incarcarea linkului!<br />";
			return NULL;
		}
    }*/
        
//    public function setText(){
//        $this->text = "targa ".self::PP
//				."\r\ntarga ".self::LOGO
//				.$this->update;
//		return $this->text;
//    }
//
    public function writeToFile(){                
        file_put_contents(self::FILE_DEST, $this->text);
    }
//
//	private function modify($text){
//          $finalString = "";
//          $parts = explode("***", $text);
//          foreach($parts as $part){
//          	$finalString .= "*** ".trim($part)."\n";
//          }
//          $this->text = trim($finalString);
//	}
//
//	public function getErrorMessage () {
//          return $this->err_message;
//	}
}