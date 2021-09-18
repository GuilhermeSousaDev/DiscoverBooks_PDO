<?php
require_once 'vendor/autoload.php';

if(!isset($_SESSION['logado'])) {
    header("location: Login/login.php");
}else {
    try {
        $crud = new \App\Model\CrudLivros();
        $type = new \App\Model\Methods();
    } catch (Exception $e) {
        $erros = $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/styles.css" rel="stylesheet">
    <script src="public/js/index.js"></script>
    <title>Discover</title>
</head>
<body>
    <nav>
        <h1>Discover Books</h1>
        <div>
            <a href="public_book.php?autor=<?php echo isset($_SESSION['user'])? $_SESSION['user'] : 'Anônimo'?>">Publicar um livro</a>
        </div>
    </nav>
    <br>
    <br>
    <div class="container">
        <h1>Recomendados</h1>
        <div class="recomended">  
            <div><span class="next" onclick="next()">></span></div>
            <div><span class="prev" onclick="prev()"><</span></div>      
            <?php
            if(!empty($crud->Read())) {
                foreach($crud->Read() as $row) { ?>
                <?php echo isset($erros)? $erros : ''?>
                   <a href="book.php?book_id=<?php echo $row['book_id']?>">
                       <img style="width: 200px; height: 300px" src="imagens/<?php echo $row['capa']?>">
                       <p><?php echo $row['name_book']?></p>
                   </a>
            <?php }
            }
            ?>
        </div>
        <br>
        <h1>Terror</h1>
        <div class="terror">
            <span class="nextB" onclick="nextB()">></span>
            <span class="prevB" onclick="prevB()"><</span>    
            <?php
            if(!empty($type->searchTypeTerror())) {
                foreach($type->searchTypeTerror() as $row) { ?>
                <?php echo isset($erros)? $erros : ''?>
                   <a href="book.php?book_id=<?php echo $row['book_id']?>">
                       <img style="width: 200px; height: 300px" src="imagens/<?php echo $row['capa']?>">
                       <p><?php echo $row['name_book']?></p>
                   </a>
            <?php }
            }
            ?>
        </div>
        <br>
        <h1>Romance</h1>
        <div class="romance">
            <span class="nextC" onclick="nextC()">></span>
            <span class="prevC" onclick="prevC()"><</span>    
            <?php
            if(!empty($type->searchTypeRomance())) {
                foreach($type->searchTypeRomance() as $row) { ?>
                <?php echo isset($erros)? $erros : ''?>
                   <a href="book.php?book_id=<?php echo $row['book_id']?>">
                       <img style="width: 200px; height: 300px" src="imagens/<?php echo $row['capa']?>">
                       <p><?php echo $row['name_book']?></p>
                   </a>
            <?php }
            }
            ?>
        </div>
        <br>
        <h1>Aventura</h1>
        <div class="adventure">   
            <span class="nextD" onclick="nextD()">></span>
            <span class="prevD" onclick="prevD()"><</span> 
            <?php
            if(!empty($type->searchTypeAdventure())) {
                foreach($type->searchTypeAdventure() as $row) { ?>
                <?php echo isset($erros)? $erros : ''?>
                   <a href="book.php?book_id=<?php echo $row['book_id']?>">
                       <img style="width: 200px; height: 300px" src="imagens/<?php echo $row['capa']?>">
                       <p><?php echo $row['name_book']?></p>
                   </a>
            <?php }
            }
            ?>
        </div>
        <br>
        <h1>Drama</h1>
        <div class="drama">
            <span class="nextE" onclick="nextE()">></span>
            <span class="prevE" onclick="prevE()"><</span>    
            <?php
            if(!empty($type->searchTypeDrama())) {
                foreach($type->searchTypeDrama() as $row) { ?>
                <?php echo isset($erros)? $erros : ''?>
                   <a href="book.php?book_id=<?php echo $row['book_id']?>">
                       <img style="width: 200px; height: 300px" src="imagens/<?php echo $row['capa']?>">
                       <p><?php echo $row['name_book']?></p>
                   </a>
            <?php }
            }
            ?>
        </div>
    </div>
</body>
</html>