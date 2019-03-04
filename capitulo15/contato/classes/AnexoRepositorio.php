<?php

class AnexoRepositorio{

    private $conexao;

    public function __construct($conexao){
        $this->conexao = $conexao;
    }


    public function buscar_anexos($contato_id){
        $contato_id = strip_tags($this->conexao->real_escape_string($contato_id));

        $sql = "SELECT * from anexo where contato_id = {$contato_id}";
    
        $resultado = $this->conexao->query($sql);
        $anexos = [];
    
        while ($anexo = $resultado->fetch_object('Anexo')) {
            $anexos[] = $anexo;
        }
        return $anexos;
    }
    
    
    public function buscar_anexo($anexo_id){

        $anexo_id = strip_tags($this->conexao->real_escape_string($anexo_id));

        $sql = "SELECT * from anexo where id = {$anexo_id}";
    
        $resultado = $this->conexao->query($sql);
       
        return $resultado->fetch_object('Anexo');
    }
    
    
    public function salvar_anexo(Anexo $anexo){

        $nome =  strip_tags($this->conexao->real_escape_string($anexo->getNome()));
        $arquivo = strip_tags($this->conexao->real_escape_string($anexo->getArquivo()));

        $sql = "INSERT INTO anexo (nome, arquivo, contato_id) 
                VALUES (
                            '{$nome}',
                            '{$arquivo}',
                            {$anexo->getContato_id()}
                        )";
        $this->conexao->query($sql);
    
    }
    
    public function remover_anexo($id){
        $id = strip_tags($this->conexao->real_escape_string($id));
        
        $sql = "DELETE FROM anexo WHERE id = {$id}";
        $this->conexao->query($sql);
    }
}