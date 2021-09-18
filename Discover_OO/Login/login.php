<?php
require_once '../vendor/autoload.php';

if(isset($_POST['enviar'])) {
    $user = new \App\Model\User();
    $user->setNome($_POST['username']);
    $user->setEmail($_POST['email']);
    $user->setSenha(md5($_POST['senha']));

    try {
        $Test = new \App\Model\Authenticate();
        $Test->Login($user);
    } catch (\Exception $e) {
        $erros = $e->getMessage();
    }
}

if(isset($_POST['criar'])) {
    header("location: cadastrar.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <p style="color: red"><?php echo !empty($erros)? $erros : ''?></p>
    <form action="" method="POST" id="form">
        <p id="res"></p>
        <input type="text" name="username" id="username">
        <input type="text" name="email" id="email">
        <input type="password" name="senha" id="senha">
        <button name="enviar">Entrar</button>
        <button name="criar">Criar Conta</button>
    </form>
    <script>
        const form = document.getElementById('form')
        form.oninput = () => {
            const xhr = new XMLHttpRequest()
            xhr.onload = () => {
                const res = document.getElementById('res')
                res.innerHTML = xhr.responseText
            }
            const email = document.getElementById('email').value
            xhr.open("POST","../App/model/ajax.php")
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send("email=" + email)
        }
    </script>
</body>
</html>