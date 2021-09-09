<?php
require_once 'vendor/autoload.php';
if(!isset($_SESSION['logado'])) {
    header("location: login.php");
}

$crud = new \App\Model\Crud();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discover</title>
</head>
<body>
    <?php echo $_SESSION['user_id']?>
    <?php
        foreach($crud->Read() as $row) { ?>
           <a href="book.php?book_id=<?php echo $row['book_id']?>">
               <img src="imagens/<?php echo $row['capa']?>">
               <p><?php echo $row['name_book']?></p>
           </a>
    <?php }
    ?>
</body>
</html>