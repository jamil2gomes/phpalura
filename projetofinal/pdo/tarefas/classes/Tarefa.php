<?php

class Tarefa{

    private $id = 0;
    private $nome;
    private $descricao;
    private $prazo;
    private $prioridade = 1;
    private $concluida;
    private $anexos = [];

    public function setId(int $id){
        $this->id = $id;
    }

    public function getId():int
    {
        return $this->id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setPrazo($prazo){
        $this->prazo = $prazo;
    }

    public function getPrazo()
    {
        return $this->prazo;
    }

    public function setPrioridade($prioridade){
        $this->prioridade = $prioridade;
    }

    public function getPrioridade()
    {
        return $this->prioridade;
    }

    public function setConcluida($concluida){
        $this->concluida = $concluida;
    }

    public function getConcluida()
    {
        return $this->concluida;
    }

    public function setAnexos( array $anexos){
        $this->anexos = [];

        foreach ($anexos as $anexo) {
            $this->adicionarAnexo($anexo);   
        }    
    }

    public function adicionarAnexo(Anexo $anexo){
        array_push($this->anexos, $anexo);
    }

    public function getAnexos()
    {
        return $this->anexos;
    }
}