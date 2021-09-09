<?php
namespace App\Model;

class Crud {
    public function Create(Livros $l) {
        $sql = "INSERT INTO discover(user_id,name_book,book,description) VALUES(?,?,?,?)";
        $query = Conexao::getConn()->prepare($sql);
        $query->bindValue(1, $_SESSION['user_id']);
        $query->bindValue(2, $l->getNome());
        $query->bindValue(3, $l->getBook());
        $query->bindValue(4, $l->getDescription());
    }

    public function Read() {
        $sql = "SELECT * FROM book_users";
        $query = Conexao::getConn()->prepare($sql);
        $query->execute();
        if($query->rowCount() > 0) {
            $row = $query->fetchAll(\PDO::FETCH_ASSOC);
            return $row;
        }else {
            return $row = [];
        }
    }
    
    public function Update(Livros $l) {
        $sql = "UPDATE discover SET name_book = ?, book = ?, description = ?";
        $query = Conexao::getConn()->prepare($sql);
        $query->bindValue(1, $l->getNome());
        $query->bindValue(2, $l->getBook());
        $query->bindValue(3, $l->getDescription());
        $query->execute();
    }

    public function Delete($id){
        $sql = "DELETE FROM discover WHERE book_id = ?";
        $query = Conexao::getConn()->prepare($sql);
        $query->bindValue(1, $id);
    }
}