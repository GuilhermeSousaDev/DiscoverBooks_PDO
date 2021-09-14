<?php
require_once 'vendor/autoload.php';

if(!isset($_SESSION['logado'])) {
    header("location: Login/login.php");
}else {
    if(isset($_POST['enviar'])) {
        $book = new \App\Model\Livros();
        $book->setNome($_POST['name_book']);
        $book->setDescription($_POST['description']);
        $book->setBook($_POST['book']);  
        $book->setType($_POST['type']);
        $book->setFileName($_FILES['capa']['name']);
        $book->setFileTmp($_FILES['capa']['tmp_name']);
        $book->setFileExtension(pathinfo($_FILES['capa']['name'],PATHINFO_EXTENSION));
        $book->setFileSize($_FILES['capa']['size']);
        try {
            $newBook = new \App\Model\CrudLivros();
            $newBook->Create($book);
        } catch (\Exception $e) {
            $erros = $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicar Livro</title>
</head>
<body>  
    <?php echo !empty($erros)? $erros : ''?>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="text" name="name_book">
        <input type="text" name="description">
        <select name="type">
            <option value="Aventura">Aventura</option>
            <option value="Romance">Romance</option>
            <option value="Terror">Terror</option>
            <option value="Drama">Drama</option>

        </select>
        <textarea name="book"></textarea>
        <input type="file" name="capa">
        <button name="enviar">Enviar</button>
    </form>
</body>
</html>