<?php
require_once 'vendor/autoload.php';

if(!isset($_SESSION['logado'])) {
    header("location: Login/login.php");
}else {
    $crud = new \App\Model\CrudLivros();
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
        .container {
            display: flex;
            overflow: hidden;
        }
        .container a {
            margin-left: 10px;
        }
        .container .prev {
            position: absolute;
            left: 10px;
            right: 0;
            top: 210px;
            background: black;
            color: white;
            width: 30px;
            text-align: center;
            cursor: pointer;
        }
        .container .next {
            position: absolute;
            right: 10px;
            top: 210px;
            background: black;
            color: white;
            width: 30px;
            text-align: center;
            cursor: pointer;
        }
    </style>
    <nav>
        <h1>Discover Books</h1>
        <div>
            <a href="public_book.php">Publicar um livro</a>
        </div>
    </nav>
    <div class="container">
        <span class="next" onclick="next()">></span>
        <span class="prev" onclick="prev()"><</span>
        <?php
            foreach($crud->Read() as $row) { ?>
               <a href="book.php?book_id=<?php echo $row['book_id']?>">
                   <img style="width: 200px; height: 300px" src="imagens/<?php echo $row['capa']?>">
                   <p><?php echo $row['name_book']?></p>
               </a>
        <?php }
        ?>
    </div>
    <button onclick="nextBooks()">Passar</button>
    <script>
        function next() {
            const con = document.querySelector('.container')
            con.scrollLeft += 700
        }
        function prev() {
            const con = document.querySelector('.container')
            con.scrollLeft -= 700
        }
    </script>
</body>
</html>