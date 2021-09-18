<?php
namespace App\Model;

use Exception;

class Methods {
    public function FindForId($book_id) {
        $conn = Conexao::getConn();
        $sql = "SELECT * FROM book_users WHERE book_id = ?";
        $query = $conn->prepare($sql);
        $query->bindValue(1, $book_id);
        $query->execute();
        if($query->rowCount() > 0) {
            return  $query->fetchAll(\PDO::FETCH_ASSOC);
        }else {
            throw new Exception("Sem Resultados");
        }
    }

    public function searchTypeAdventure() {
        $conn = Conexao::getConn();
        $type = 'Aventura';
        $sql = "SELECT * FROM book_users WHERE type = ?";
        $query = $conn->prepare($sql);
        $query->bindValue(1, $type);
        $query->execute();
        if($query->rowCount() > 0) {
            return $query->fetchAll(\PDO::FETCH_ASSOC);
        }else {
           throw new Exception("Sem Resultados");
        }
    }
    public function searchTypeRomance() {
        $conn = Conexao::getConn();
        $type = 'Romance';
        $sql = "SELECT * FROM book_users WHERE type = ?";
        $query = $conn->prepare($sql);
        $query->bindValue(1, $type);
        $query->execute();
        if($query->rowCount() > 0) {
            return $query->fetchAll(\PDO::FETCH_ASSOC);
        }else {
            throw new Exception("Sem Resultados");
        }
    }
    public function searchTypeTerror() {
        $conn = Conexao::getConn();
        $type = 'Terror';
        $sql = "SELECT * FROM book_users WHERE type = ?";
        $query = $conn->prepare($sql);
        $query->bindValue(1, $type);
        $query->execute();
        if($query->rowCount() > 0) {
            return $query->fetchAll(\PDO::FETCH_ASSOC);
        }else {
            throw new Exception("Sem Resultados");
        }
    }
    public function searchTypeDrama() {
        $conn = Conexao::getConn();
        $type = 'Drama';
        $sql = "SELECT * FROM book_users WHERE type = ?";
        $query = $conn->prepare($sql);
        $query->bindValue(1, $type);
        $query->execute();
        if($query->rowCount() > 0) {
            return $query->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
}