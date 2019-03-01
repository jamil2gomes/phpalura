<?php

class Tarefa{

    private $id = 0;
    private $nome;
    private $descricao;
    private $prazo;
    private $prioridade;
    private $concluida;
    private $anexos = [];

    public function setId(int $id){
        $this->id = $id;
    }

    public function getId():int
    {
        return $this->id;
    }

    public function setNome(string $nome){
        $this->nome = $nome;
    }

    public function getNome():string 
    {
        return $this->nome;
    }

    public function setDescricao(string $descricao){
        $this->descricao = $descricao;
    }

    public function getDescricao():string 
    {
        return $this->descricao;
    }

    public function setPrazo(string $prazo){
        $this->prazo = $prazo;
    }

    public function getPrazo():string 
    {
        return $this->prazo;
    }

    public function setPrioridade(int $prioridade){
        $this->prioridade = $prioridade;
    }

    public function getPrioridade():int 
    {
        return $this->prioridade;
    }

    public function setConcluida(bool $concluida){
        $this->concluida = $concluida;
    }

    public function getConcluida():bool 
    {
        return $this->concluida;
    }

    public function setAnexos(array $anexos){
        $this->anexos = [];

        foreach ($anexos as $anexo) {
            $this->adicionarAnexo($anexo);   
        }    
    }

    public function adicionarAnexo(Anexo $anexo){
        array_push($this->anexos, $anexo);
    }

    public function getAnexos():array 
    {
        return $this->anexos;
    }
}