<?php
require_once 'vendor/autoload.php';

if(isset($_POST['enviar'])) {
    $user = new \App\Model\User();
    $user->setNome($_POST['username']);
    $user->setEmail($_POST['email']);
    $user->setSenha(md5($_POST['senha']));

    $Test = new \App\Model\Methods();
    $Test->Login($user);
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
    <form action="" method="POST">
        <input type="text" name="username">
        <input type="text" name="email">
        <input type="password" name="senha">
        <button name="enviar">Entrar</button>
        <button name="criar">Criar Conta</button>
    </form>
</body>
</html>