<?php

class TarefaRepositorio{
    private $conexao;

   public function __construct($conexao){
        $this->conexao = $conexao;
    }



    public function salvar(Tarefa $tarefa){
        $nome       = $tarefa->getNome();
        $descricao  = $tarefa->getDescricao();
        $prioridade = $tarefa->getPrioridade();
        $prazo      = $tarefa->getPrioridade();
        $concluida  = ($tafera->getConcluida()) ? 1 : 0;

        if(is_object($prazo)){
            $prazo = $prazo->format('Y-m-d');
        }

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
        $nome       = $tarefa->getNome();
        $descricao  = $tarefa->getDescricao();
        $prioridade = $tarefa->getPrioridade();
        $prazo      = $tarefa->getPrioridade();
        $concluida  = ($tafera->getConcluida()) ? 1 : 0;

        if(is_object($prazo)){
            $prazo = $prazo->format('Y-m-d');
        }

        $sql = "UPDATE tarefa SET 
                        nome        = '{$nome}', 
                        descricao   = '{$descricao}' ,  
                        prioridade  =  {$prioridade}, 
                        prazo       = '{$prazo}',
                        concluida   =  {$concluida}) 
                WHERE id = {$id}";
        
        $this->conexao->query($sql);
    }


    public function buscar($tarefa_id = 0){

        if ($tarefa_id>0) {
           return $this->buscarTarefa($tarefa_id);
        }

        return $this->buscarTarefas();
    }



    private function buscarTarefa($tarefa_id){
        $sql = "SELECT * FROM tarefa WHERE id ={$tarefa_id}";
        $resultado = $this->conexao->query($sql);
        $tarefa = $resultado->fetch_object('Tarefa');
        return $tarefa;
    }



    private function buscarTarefas(){
        $sql = "SELECT * FROM tarefa";
        $resultado = $this->conexao->query($sql);

        $tarefas = [];

        while($tarefa = $resultado->fetch_object('Tarefa')){
            $tarefas[] = $tarefa;
        }

        return $tarefas;
    }



    public function remover($tarefa_id){
         $sql = "DELETE FROM tarefa WHERE id = {$tarefa_id}";
         $this->conexao->query($sql);
    }
}