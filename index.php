<?php
    include_once 'Starter.php';
    include_once 'Config.php';
    $starter = new Starter();
    $config = new Config();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Scroll Editor</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">        
        <link rel="stylesheet" href="css/style.css" />        
        <script src="jQuery/jquery-2.1.3.min.js"></script>
        <script src="js/update.js"></script>
    </head>
    <body>
        <div class="body container-fluid">
            <form method="POST" action="save.php" class="form-horizontal">
                <textarea name="scroll" id="scroll_textarea" class="form-control" required="required"><?php echo $starter->getText() ?></textarea>
                <br>
                
                <div class="input-group check">
                    <input type="password" name="check" class="form-control" placeholder="verificare" required="required">
                    <span class="input-group-btn">
                        <input type="submit" value="Genereaza" class="btn btn-success">
                    </span>
                </div>
            </form>
        </div>        
    </body>
</html>