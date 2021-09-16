<?php
require_once 'vendor/autoload.php';

if(!isset($_SESSION['logado'])) {
    header("location: Login/login.php");
}else {
    $crud = new \App\Model\CrudLivros();
    $type = new \App\Model\Methods();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/css/styles.css" rel="stylesheet">
    <title>Discover</title>
</head>
<body style="height: 1000px;">
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
                foreach($crud->Read() as $row) { ?>
                   <a href="book.php?book_id=<?php echo $row['book_id']?>">
                       <img style="width: 200px; height: 300px" src="imagens/<?php echo $row['capa']?>">
                       <p><?php echo $row['name_book']?></p>
                   </a>
            <?php }
            ?>
        </div>
        <br>
        <h1>Terror</h1>
        <div class="terror">
            <span class="nextC" onclick="nextC()">></span>
            <span class="prevC" onclick="prevC()"><</span>    
            <?php
                foreach($type->searchTypeTerror() as $row) { ?>
                   <a href="book.php?book_id=<?php echo $row['book_id']?>">
                       <img style="width: 200px; height: 300px" src="imagens/<?php echo $row['capa']?>">
                       <p><?php echo $row['name_book']?></p>
                   </a>
            <?php }
            ?>
        </div>
        <br>
        <h1>Romance</h1>
        <div class="romance">
            <span class="nextB" onclick="nextB()">></span>
            <span class="prevB" onclick="prevB()"><</span>    
            <?php
                foreach($type->searchTypeRomance() as $row) { ?>
                   <a href="book.php?book_id=<?php echo $row['book_id']?>">
                       <img style="width: 200px; height: 300px" src="imagens/<?php echo $row['capa']?>">
                       <p><?php echo $row['name_book']?></p>
                   </a>
            <?php }
            ?>
        </div>
        <br>
        <h1>Aventura</h1>
        <div class="adventure">   
            <span class="nextA" onclick="nextA()">></span>
            <span class="prevA" onclick="prevA()"><</span> 
            <?php
                foreach($type->searchTypeAdventure() as $row) { ?>
                   <a href="book.php?book_id=<?php echo $row['book_id']?>">
                       <img style="width: 200px; height: 300px" src="imagens/<?php echo $row['capa']?>">
                       <p><?php echo $row['name_book']?></p>
                   </a>
            <?php }
            ?>
        </div>
        <br>
        <h1>Drama</h1>
        <div class="drama">
            <span class="nextD" onclick="nextD()">></span>
            <span class="prevD" onclick="prevA()"><</span>    
            <?php
                foreach($type->searchTypeDrama() as $row) { ?>
                   <a href="book.php?book_id=<?php echo $row['book_id']?>">
                       <img style="width: 200px; height: 300px" src="imagens/<?php echo $row['capa']?>">
                       <p><?php echo $row['name_book']?></p>
                   </a>
            <?php }
            ?>
        </div>
    </div>
    <script>
        function next() {
            const con = document.querySelector('.recomended')
            console.log(con.scrollLeft == 0)
            if(con.scrollLeft >= 0) {
                con.scrollLeft += 700
            }
        }
        function prev() {
            const con = document.querySelector('.recomended')
            if(con.scrollLeft >= 0) {
                con.scrollLeft -= 700
            }
        }
        function nextA() {
            const con = document.querySelector('.adventure')
            if(con.scrollLeft >= 0) {
                con.scrollLeft += 700
            }
        }
        function prevA() {
            const con = document.querySelector('.adventure')
            if(con.scrollLeft >= 0) {
                con.scrollLeft -= 700
            }
        }
    </script>
</body>
</html>