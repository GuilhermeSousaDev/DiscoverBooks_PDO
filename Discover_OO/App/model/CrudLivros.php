<?php
namespace App\Model;

use Exception;

class CrudLivros {
    public function Create(Livros $l) {
        $fileSize = $l->getFileSize();
        $extension = $l->getFileExtension();
        $tmp_name = $l->getFileTmp();
        $suport = array('png','jpg','jpeg');
        if($fileSize > 2097152 || !in_array($extension,$suport)) {
            throw new Exception("Arquivo não suportado");
            $message = 'File too large. File must be less than 2 megabytes.'; 
            echo '<script type="text/javascript">alert("'.$message.'");</script>'; 
        }else {
            $fileName = $l->getFileName();
            $pasta = "imagens/$fileName";
            if(move_uploaded_file($tmp_name,$pasta)) {
                $conn = Conexao::getConn();
                $sql = "INSERT INTO book_users(user_id,name_book,book,description,capa,autor,type) VALUES(?,?,?,?,?,?,?)";
                $query = $conn->prepare($sql);
                $query->bindValue(1, $_SESSION['user_id']);
                $query->bindValue(2, $l->getNome());
                $query->bindValue(3, $l->getBook());
                $query->bindValue(4, $l->getDescription());
                $query->bindValue(5, $fileName);
                $query->bindValue(6, $_SESSION['user']);
                $query->bindValue(7, $l->getType());
                $query->execute();
                if($query->rowCount()) {
                    echo "Cadastrado com Sucesso";
                }else {
                    throw new Exception("Erro ao Cadastrar");
                }
            }
        }
    }

    public function Read() {
        $conn = Conexao::getConn();
        $sql = "SELECT * FROM book_users ORDER BY book_id DESC";
        $query = $conn->prepare($sql);
        $query->execute();
        if($query->rowCount() > 0) {
            return $query->fetchAll(\PDO::FETCH_ASSOC);
        }else {
            return [];
        }
    }

    public function Update(Livros $l) {
        $conn = Conexao::getConn();
        $sql = "UPDATE book_users SET name_book = ?, book = ?, description = ?";
        $query = $conn->prepare($sql);
        $query->bindValue(1, $l->getNome());
        $query->bindValue(2, $l->getBook());
        $query->bindValue(3, $l->getDescription());
        $query->execute();
    }

    public function Delete($id){
        $conn = Conexao::getConn();
        $sql = "DELETE FROM book_users WHERE book_id = ?";
        $query = $conn->prepare($sql);
        $query->bindValue(1, $id);
        $query->execute();
    }
}