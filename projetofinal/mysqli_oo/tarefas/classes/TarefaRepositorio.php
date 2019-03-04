<?php

class TarefaRepositorio{
    private $conexao;

   public function __construct($conexao){
        $this->conexao = $conexao;
    }



    public function salvar(Tarefa $tarefa){
        $nome       = strip_tags($this->conexao->real_escape_string($tarefa->getNome()));
        $descricao  = strip_tags($this->conexao->real_escape_string($tarefa->getDescricao()));
        $prioridade = $tarefa->getPrioridade();
        $prazo      = $tarefa->getPrazo();
        $concluida  = ($tarefa->getConcluida()) ? 1 : 0;

        $sql = "INSERT INTO tarefa (nome, descricao, prioridade, prazo, concluida) 
                 VALUES(
                        '{$nome}',
                        '{$descricao}',                
                         {$prioridade},                
                        '{$prazo}',                
                         {$concluida} 
                        )";
        
        $this->conexao->query($sql);

    }



    public function atualizar(Tarefa $tarefa){
        $id         = $tarefa->getId();
        $nome       = strip_tags($this->conexao->real_escape_string($tarefa->getNome()));
        $descricao  = strip_tags($this->conexao->real_escape_string( $tarefa->getDescricao()));
        $prioridade = $tarefa->getPrioridade();
        $prazo      = $tarefa->getPrazo();
        $concluida  = ($tarefa->getConcluida()) ? 1 : 0;

        $sqlEditar = "UPDATE tarefa SET nome = '{$nome}', descricao = '{$descricao}', 
        prioridade = {$prioridade}, prazo = '{$prazo}', concluida = {$concluida}  
         WHERE id = {$id}";
         $this->conexao->query($sqlEditar);
    }


    public function buscar($tarefa_id = 0){

        if ($tarefa_id>0) {
           return $this->buscarTarefa($tarefa_id);
        }

        return $this->buscarTarefas();
    }



    private function buscarTarefas(){
        $sql = "SELECT * FROM tarefa";
        $resultado = $this->conexao->query($sql);

        $tarefas = [];
        while ($tarefa = $resultado->fetch_object('Tarefa')){
            $tarefas[] = $tarefa; 
        }
            return $tarefas;
        }
        private function buscarTarefa($id)
        {
            $id = strip_tags($this->conexao->real_escape_string($id));

            $sqlBusca = 'SELECT * FROM tarefa WHERE id = ' . $id;
            $resultado = $this->conexao->query($sqlBusca);
            $tarefa = $resultado->fetch_object('Tarefa');
            $tarefa->setAnexos($this->buscar_anexos($tarefa->getId()));
            return $tarefa;
        }



    public function remover($tarefa_id){
        $tarefa_id = strip_tags($this->conexao->real_escape_string($tarefa_id));
         $sql = "DELETE FROM tarefa WHERE id = {$tarefa_id}";
         $this->conexao->query($sql);
    }


public function buscar_anexos($tarefa_id){
    $tarefa_id = strip_tags($this->conexao->real_escape_string($tarefa_id));

    $sql = "SELECT * from anexos where tarefa_id = {$tarefa_id}";

    $resultado = $this->conexao->query($sql);
    $anexos = [];

    while ($anexo = $resultado->fetch_object('Anexo')) {
        $anexos[] = $anexo;
    }
    return $anexos;
}


public function buscar_anexo($anexo_id){

    $anexo_id = strip_tags($this->conexao->real_escape_string($anexo_id));

    $sql = "SELECT * from anexos where id = {$anexo_id}";

    $resultado = $this->conexao->query($sql);
   
    return $resultado->fetch_object('Anexo');
}


public function salvar_anexo(Anexo $anexo){

    $nome    = strip_tags($this->conexao->real_escape_string($anexo->getNome()));
    $arquivo = strip_tags($this->conexao->real_escape_string($anexo->getArquivo()));
    $tarefa_id = $anexo->getTarefa_id();

    $sql = "INSERT INTO anexos (nome, arquivo, tarefa_id) 
            VALUES (
                        '{$nome}',
                        '{$arquivo}',
                        {$tarefa_id}
                    )";

    $this->conexao->query($sql);

}

public function remover_anexo($id){
    $id = strip_tags($this->conexao->real_escape_string($id));

    $sql = "DELETE FROM anexos WHERE id = {$id}";
    $this->conexao->query($sql);
}


}