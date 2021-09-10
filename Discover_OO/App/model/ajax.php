<?php
namespace App\Model;
require 'conexao.php';

class Ajax {
    public static function Response() {   
        if(isset($_POST)) {
            foreach($_POST as $post) {
                if(!filter_var($post, FILTER_VALIDATE_EMAIL)) {
                    echo "Email Inválido";
                }else {
                    $sql = "SELECT email FROM usuario WHERE email = ?";
                    $query = Conexao::getConn()->prepare($sql);
                    $query->bindValue(1, $post);
                    $query->execute();
                    if($query->rowCount() > 0) {
                        echo "Email já existente";
                    }else {
                        echo "(V) Email Válido";
                    }   
                }
            }
        }        
    }
}
Ajax::Response();