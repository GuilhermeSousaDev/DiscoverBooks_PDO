<?php
require_once 'vendor/autoload.php';

if(!isset($_SESSION['logado'])) {
    header("location: Login/login.php");
}else {
    $crud = new \App\Model\CrudLivros();
    $typeAventure = new \App\Model\Methods();
    $typeTerror = new \App\Model\Methods();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discover</title>
</head>
<body style="height: 1000px;">
    <style>
        body {
            scroll-behavior: smooth;
        }
        nav {
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 30px;
        }
        .crud {
            display: flex;
            overflow: hidden;
        }
        .crud a {
            margin-left: 10px;
        }
        .adventure {
            display: flex;
            overflow: hidden;
        }
        .adventure a {
            margin-left: 10px;
        }
        .next {
            position: absolute;
            top: 290px;
            right: 10px;
            background: black;
            color: white;
            padding: 5px;
            cursor: pointer;
        }
        .prev {
            position: absolute;
            top: 290px;
            left: 10px;
            background: black;
            color: white;
            padding: 5px;
            cursor: pointer;
        }
        .nextA {
            position: absolute;
            top: 740px;
            right: 10px;
            background: black;
            color: white;
            padding: 5px;
            cursor: pointer;
        }
        .prevA {
            position: absolute;
            top: 740px;
            left: 10px;
            background: black;
            color: white;
            padding: 5px;
            cursor: pointer;
        }
    </style>
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
        <div class="crud">  
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
        <h1>Aventura</h1>
        <div class="Adventure">   
            <span class="nextA" onclick="nextA()">></span>
            <span class="prevA" onclick="prevA()"><</span> 
            <?php
                foreach($typeAventure->searchTypeAdventure() as $row) { ?>
                   <a href="book.php?book_id=<?php echo $row['book_id']?>">
                       <img style="width: 200px; height: 300px" src="imagens/<?php echo $row['capa']?>">
                       <p><?php echo $row['name_book']?></p>
                   </a>
            <?php }
            ?>
        </div>
        <br>
        <h1>Terror</h1>
        <div class="crud">
            <span class="next" onclick="next()">></span>
            <span class="prev" onclick="prev()"><</span>    
            <?php
                foreach($typeTerror->searchTypeTerror() as $row) { ?>
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
            const con = document.querySelector('.crud')
            con.scrollLeft += 700
        }
        function prev() {
            const con = document.querySelector('.crud')
            con.scrollLeft -= 700
        }
        function nextA() {
            const con = document.querySelector('.adventure')
            con.scrollLeft += 700
        }
        function prevA() {
            const con = document.querySelector('.adventure')
            con.scrollLeft -= 700
        }
    </script>
</body>
</html>