<?php

require_once 'vendor/autoload.php';
    if(!isset($_SESSION['logado'])) {
        header("location: Login/login.php");
    }
    if(isset($_GET['book_id'])) {
        $Book = new \App\Model\Methods();  
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php
        foreach($Book->FindForId($_GET['book_id']) as $row) { ?>
            <div>    
                <img style="width: 200px; height: 300px" src="imagens/<?php echo $row['capa']?>">
                <h1><?php echo $row['name_book']?></h1>
                <p><?php echo $row['description']?></p>
                <p>Autor: <?php echo !empty($row['autor'])? $row['autor'] : 'Anônimo'?></p>
                <small>Gênero: <?php echo $row['type']?></small>
            </div>
    <?php }
    ?>
        
</body>
</html>