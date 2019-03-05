<?php

class AnexoRepositorio{

    private $conexao;

    public function __construct($conexao){
        $this->conexao = $conexao;
    }


    public  function buscar_anexos($contato_id){

        $contato_id = strip_tags($contato_id);

        $sql = "SELECT * from anexo where contato_id =:contato_id";
    
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(":contato_id", $contato_id);
        $stmt->execute();
    
        $anexos = [];
    
        while ($anexo = $stmt->fetchObject('Anexo')) {
            $anexos[] = $anexo;
        }
        return $anexos;
    }
    
    
    public function buscar_anexo($anexo_id){

        $anexo_id = strip_tags($anexo_id);

        $sql = "SELECT * from anexo where id =:anexo_id";
    
        $resultado = $this->conexao->prepare($sql);
        $resultado->bindValue(":anexo_id", $anexo_id);
        $resultado->execute();

        return $resultado->fetchObject('Anexo');
    }
    
    
    public function salvar_anexo(Anexo $anexo){

        $nome    = strip_tags($anexo->getNome());
        $arquivo = strip_tags($anexo->getArquivo());
        $contato_id = $anexo->getContato_id();

    $sql = "INSERT INTO anexo (nome, arquivo, contato_id) 
                      VALUES  (:nome, :arquivo, :contato_id)";

    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(":nome", $nome);
    $stmt->bindValue(":arquivo", $arquivo);
    $stmt->bindValue(":contato_id", $contato_id);

    $stmt->execute();
    
    }
    
    public function remover_anexo($id){
        $id = strip_tags($id);

        $sql = "DELETE FROM anexo WHERE id =:id";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(":id",$id);
        $stmt->execute();
    }
}