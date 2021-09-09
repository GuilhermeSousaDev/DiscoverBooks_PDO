<?php
namespace App\Model;

class Livros {
    public $nome;
    public $book;
    public $description;

    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function getNome() {
        return $this->nome;
    }

    public function setBook($book) {
        $this->book = $book;
    }

    public function getBook() {
        return $this->book;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getDescription() {
        return $this->description;
    }

}