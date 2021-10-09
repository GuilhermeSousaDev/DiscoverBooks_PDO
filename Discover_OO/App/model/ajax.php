<?php
namespace App\Model;
require 'conexao.php';

class Ajax {
    public static function Response() {   
        if(isset($_GET['q'])) {
            $sql = "SELECT * FROM book_users WHERE name_book LIKE '%$_GET[q]%'";
            $query = Conexao::getConn()->prepare($sql);
            $query->execute();
            if($query->rowCount() > 0) {
                foreach($query->fetchAll(\PDO::FETCH_ASSOC) as $row) {
                        echo "<div>";
                            echo "<h1>$row[name_book]</h1>";
                            echo "<img style='width: 200px; height: 200px;' src=imagens/$row[capa]>";
                            echo "<p>$row[description]</p>";
                            echo "<a href=book.php?book_id=$row[book_id]><button>Ler</button><a>";
                        echo "</div>";
                }
            }else {
                echo "<p>Sem resultados</p>";
            }   
        }
    }        
}
Ajax::Response();