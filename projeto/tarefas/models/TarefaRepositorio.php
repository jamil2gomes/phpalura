<?php

class TarefaRepositorio{
    private $conexao;

   public function __construct(PDO $conexao){
        $this->conexao = $conexao;
    }



    public function salvar(Tarefa $tarefa){

        $nome       = strip_tags($tarefa->getNome());
        $descricao  = strip_tags($tarefa->getDescricao());
        $prioridade = $tarefa->getPrioridade();
        $prazo      = $tarefa->getPrazo();
        $concluida  = ($tarefa->getConcluida()) ? 1 : 0;

        $sql = "INSERT INTO tarefa (nome, descricao, prioridade, prazo, concluida) 
                 VALUES(:nome, :descricao, :prioridade, :prazo, :concluida)";
        
        $stmt =  $this->conexao->prepare($sql);

        $stmt->bindValue(':nome',$nome);
        $stmt->bindValue(':descricao',$descricao);
        $stmt->bindValue(':prioridade',$prioridade);
        $stmt->bindValue(':prazo',$prazo);
        $stmt->bindValue(':concluida',$concluida);

        $stmt->execute();

    }



    public function atualizar(Tarefa $tarefa){
        
        $id         = $tarefa->getId();
        $nome       = strip_tags($tarefa->getNome());
        $descricao  = strip_tags($tarefa->getDescricao());
        $prioridade = $tarefa->getPrioridade();
        $prazo      = $tarefa->getPrazo();
        $concluida  = ($tarefa->getConcluida()) ? 1 : 0;

        $sqlEditar = "UPDATE tarefa SET nome =:nome, descricao =:descricao,
         prioridade =:prioridade, prazo =:prazo, concluida =:concluida WHERE id =:id";

         $stmt = $this->conexao->prepare($sqlEditar);

         $stmt->bindValue(':nome',$nome);
         $stmt->bindValue(':descricao',$descricao);
         $stmt->bindValue(':prioridade',$prioridade);
         $stmt->bindValue(':prazo',$prazo);
         $stmt->bindValue(':concluida',$concluida);
         $stmt->bindValue(':id',$id);
 
         $stmt->execute();

    }


    public function buscar($tarefa_id = 0){

        if ($tarefa_id>0) {
           return $this->buscarTarefa($tarefa_id);
        }

        return $this->buscarTarefas();
    }



    private function buscarTarefas(){
        $sql = "SELECT * FROM tarefa";
        $resultado = $this->conexao->query($sql,PDO::FETCH_CLASS,'Tarefa')->fetchAll();
        return $resultado;
    }

        private function buscarTarefa($id)
        {
            $id = strip_tags($id);

            $sqlBusca = "SELECT * FROM tarefa WHERE id =:id";

            $stmt = $this->conexao->prepare($sqlBusca);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            $tarefa = $stmt->fetchObject('Tarefa');
            $tarefa->setAnexos($this->buscar_anexos($tarefa->getId()));
            return $tarefa;
        }



    public function remover($tarefa_id){
        $tarefa_id = strip_tags($tarefa_id);

         $sql = "DELETE FROM tarefa WHERE id =:tarefa_id";

         $stmt = $this->conexao->prepare($sql);
         $stmt->bindValue(":tarefa_id",$tarefa_id);
         $stmt->execute();
    }


public function buscar_anexos($tarefa_id){

    $tarefa_id = strip_tags($tarefa_id);

    $sql = "SELECT * from anexos where tarefa_id = :tarefa_id";

    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(":tarefa_id", $tarefa_id);
    $stmt->execute();

    $anexos = [];

    while ($anexo = $stmt->fetchObject('Anexo')) {
        $anexos[] = $anexo;
    }
    return $anexos;
}


public function buscar_anexo($anexo_id){

    $anexo_id = strip_tags($anexo_id);

    $sql = "SELECT * from anexos where id =:anexo_id";

    $resultado = $this->conexao->prepare($sql);
    $resultado->bindValue(":anexo_id", $anexo_id);
    $resultado->execute();
    return $resultado->fetchObject('Anexo');
}


public function salvar_anexo(Anexo $anexo){

    $nome    = strip_tags($anexo->getNome());
    $arquivo = strip_tags($anexo->getArquivo());
    $tarefa_id = $anexo->getTarefa_id();

    $sql = "INSERT INTO anexos (nome, arquivo, tarefa_id) VALUES (:nome, :arquivo, :tarefa_id)";
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(":nome", $nome);
    $stmt->bindValue(":arquivo", $arquivo);
    $stmt->bindValue(":tarefa_id", $tarefa_id);
    $stmt->execute();

}

public function remover_anexo($id){
    $id = strip_tags($id);

    $sql = "DELETE FROM anexos WHERE id =:id";

    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(":id",$id);
    $stmt->execute();
}


}