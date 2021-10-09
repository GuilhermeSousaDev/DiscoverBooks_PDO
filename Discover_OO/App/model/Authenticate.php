<?php

namespace App\Model;
use Exception;
use PDO;

class Authenticate {
    public function Login(User $u) {
        if(empty($u->getNome()) || empty($u->getEmail()) || empty($u->getSenha())) {
            throw new Exception("Preencha todos os Campos");
        }else {
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
                $row = $query->fetch(PDO::FETCH_ASSOC);
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['logado'] = true;
                $_SESSION['user'] = $row['nome'];
                header("location: ../index.php");
            }else {
                throw new Exception("Email ou Senha Inválidos");
            }
            }else {
                throw new Exception("Usuário não existe");
            }
        } 
    }
    public function Cadastrar(User $u) {
        if(empty($u->getNome()) || empty($u->getEmail()) || empty($u->getSenha())) {
            throw new Exception("Preencha todos os Campos");
        }else {
            $sql = "SELECT nome FROM usuarios WHERE nome = ?";
            $query = Conexao::getConn()->prepare($sql);
            $query->bindValue(1, $u->getNome());
            $query->execute();
            if($query->rowCount() == 0) {
                $sql = "INSERT INTO usuarios(nome,email,senha) VALUES(?,?,?)";
                $query = Conexao::getConn()->prepare($sql);
                $query->bindValue(1, $u->getNome());
                $query->bindValue(2, $u->getEmail());
                $query->bindValue(3, $u->getSenha());
                $query->execute();
                if($query->rowCount() > 0) {
                    header('location: login.php');
                }else {
                    throw new Exception("Erro ao cadastrar usuário");
                }
            }else {
                throw new Exception("Usuário existente");
            }
        }
    }
}