<?php

class Anexo{

    private $id = 0;
    private $contato_id;
    private $nome;
    private $arquivo;

    public function setId($id){
        $this->id = (int) $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setContato_id($contato_id){
        $this->contato_id = (int) $contato_id;
    }

    public function getContato_id(){
        return $this->contato_id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setArquivo($arquivo){
        $this->arquivo = $arquivo;
    }

    public function getArquivo()
    {
        return $this->arquivo;
    }

}