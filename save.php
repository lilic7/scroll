<?php
require 'Scroll.php';
$text = $_POST['scroll'];

$date = date("d");

if($_POST['check'] !== $date){
    echo "Codul nu este corect";
    return 0;
}else{
    $scroll = new Scroll($text);
    $result = $scroll->save() ? "success": "fail";
    $location = "Location: $result.php";
    //header($location);
}