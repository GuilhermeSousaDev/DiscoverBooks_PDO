<?php
require_once 'vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar Livro</title>
</head>
<body>
    <form action="">
        <input type="text" name="search" placeholder="Pesquise um Livro" oninput="showBooks(this.value)">
    </form>
    <div class="res"></div>
</body>
<script>
    function showBooks(str) {
        const res = document.querySelector('.res')
        if(str.length == '') {
            res.innerHTML = 'Preencha este campo'
        }else {
            const xhr = new XMLHttpRequest()
            xhr.onload = () => {
                res.innerHTML = xhr.responseText
            }
            xhr.open("GET","App/model/ajax.php?q=" + str, true)
            xhr.send()
        }
    }
</script>
</html>