<?php
namespace App\Model;

class Conexao {
    public static function getConn() {
        return new \PDO('mysql:host=localhost; dbname=discover; charset=utf8','root','');
    }
}