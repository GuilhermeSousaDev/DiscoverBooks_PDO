<?php
namespace App\Model;
session_start();

class Methods {
    public function Login(User $u) {
        $sql = "SELECT nome FROM usuario WHERE nome = ?";
        $query = Conexao::getConn()->prepare($sql);
        $query->bindValue(1, $u->getNome());
        $query->execute();
        if($query->rowCount() > 0) {
            $sql = "SELECT * FROM usuario WHERE nome = ? AND email = ? AND senha = ?";
            $query = Conexao::getConn()->prepare($sql);
            $query->bindValue(1, $u->getNome());
            $query->bindValue(2, $u->getEmail());
            $query->bindValue(3, $u->getSenha());
            $query->execute();
            if($query->rowCount() == 1) {
                $row = $query->fetch(\PDO::FETCH_ASSOC);
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['logado'] = true;
                header("location: index.php");
            }else {
                echo "Email ou Senha Inválidos";
            }
        }else {
            echo "Usuário não existe";
        }
    }
}