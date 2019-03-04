<?php

class Anexo{

    private $id = 0;
    private $tarefa_id;
    private $nome;
    private $arquivo;

    public function setId($id){
        $this->id = (int) $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setTarefa_id($tarefa_id){
        $this->tarefa_id = (int) $tarefa_id;
    }

    public function getTarefa_id(){
        return $this->tarefa_id;
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