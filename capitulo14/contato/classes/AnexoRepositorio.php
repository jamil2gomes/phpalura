<?php

class AnexoRepositorio{

    private $conexao;

    public function __construct($conexao){
        $this->conexao = $conexao;
    }


    public function buscar_anexos($contato_id){
        $sql = "SELECT * from anexo where contato_id = {$contato_id}";
    
        $resultado = $this->conexao->query($sql);
        $anexos = [];
    
        while ($anexo = $resultado->fetch_object('Anexo')) {
            $anexos[] = $anexo;
        }
        return $anexos;
    }
    
    
    public function buscar_anexo($anexo_id){
        $sql = "SELECT * from anexo where id = {$anexo_id}";
    
        $resultado = $this->conexao->query($sql);
       
        return $resultado->fetch_object('Anexo');
    }
    
    
    public function salvar_anexo(Anexo $anexo){
        $sql = "INSERT INTO anexo (nome, arquivo, contato_id) 
                VALUES (
                            '{$anexo->getNome()}',
                            '{$anexo->getArquivo()}',
                            {$anexo->getContato_id()}
                        )";
        $this->conexao->query($sql);
    
    }
    
    public function remover_anexo($id){
        $sql = "DELETE FROM anexo WHERE id = {$id}";
        $this->conexao->query($sql);
    }
}