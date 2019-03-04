<?php

class Contato{

    private $id =0;
    private $nome;
    private $telefone;
    private $cep;
    private $cpf;
    private $email;
    private $descricao;
    private $dataNascimento;
    private $favorito;


    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getCPF(){
        return $this->cpf;
    }

    public function setCPF($cpf){
        $this->cpf = $cpf;
    }

    public function getCEP(){
        return $this->cep;
    }

    public function setCEP($cep){
        $this->cep = $cep;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getFavorito(){
        return $this->favorito;
    }

    public function setFavorito($favorito){
        $this->favorito = $favorito;
    }

    public function getDtNascimento(){
        return $this->dataNascimento;
    }

    public function setDtNascimento($dataNascimento){
        $this->dataNascimento = $dataNascimento;
    }


    
}