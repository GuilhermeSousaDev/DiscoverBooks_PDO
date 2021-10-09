<?php
require_once '../vendor/autoload.php';
   if(isset($_POST['enviar'])) {
       try {
        $User = new \App\Model\User();
        $User->setNome($_POST['username']);
        $User->setEmail($_POST['email']);
        $User->setSenha(md5($_POST['senha']));
        
        $cadastro = new \App\Model\Authenticate();
        $cadastro->Cadastrar($User);
       } catch (\Exception $e) {
           $erros = $e->getMessage();
       }
   }
   if(isset($_POST['enviar'])) {
       header('location: login.php');
   }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>
<body>
    <form action="" method="POST">
        <p id="res"></p>
        <input type="text" name="username" id="username">
        <input type="text" name="email" id="email">
        <input type="password" name="senha" id="senha">
        <button name="enviar">Entrar</button>
        <button name="criar">Criar Conta</button>
    </form>
</body>
</html>