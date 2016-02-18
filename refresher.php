<?php 
    header('Content-Type: text/html; charset=utf-8');
    include_once 'Parser.php';
    $parser = new Parser();	
	// update la ora 10.15 si 20.15
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>News Getter</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">        
        <link rel="stylesheet" href="css/style.css" />        
        <script src="jQuery/jquery-2.1.3.min.js"></script>
    </head>
    <body>
        <div id="clock" style="display: inline-block"></div>
        <button onclick="update_now()"><i class="fa fa-refresh"></i></button>
        <hr>
        <div id="result">
            <?php
                $parser->checkFiles();
                $info = $parser->getUpdate();
                if ($info) {
                    echo $info;
                }
            ?>
            <hr>
        </div>        
    </body>
</html>
