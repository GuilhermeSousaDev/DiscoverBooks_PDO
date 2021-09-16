<?php
namespace App\Model;

class Livros {
    public $nome;
    public $book;
    public $description;
    public $type;
    public $fileName;
    public $fileTmp;
    public $fileExtension;
    public $fileSize;

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

    public function setType($type) {
        $this->type = $type;
    }
    public function getType() {
        return $this->type;
    }

    public function setFileName($fileName) {
        $this->fileName = $fileName;
    }
    public function getFileName() {
        return $this->fileName;
    }

    public function setFileExtension($ext) {
        $this->fileExtension = $ext;
    }
    public function getFileExtension() {
        return $this->fileExtension;
    }

    public function setFileSize($size) {
        $this->fileSize = $size;
    }
    public function getFileSize() {
        return $this->fileSize;
    }
    
    public function setFileTmp($tmp) {
        $this->fileTmp = $tmp;
    }
    public function getFileTmp() {
        return $this->fileTmp;
    }

}