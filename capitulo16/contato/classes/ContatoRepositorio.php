<?php

class ContatoRepositorio{

    private $conexao;

    public function __construct($conexao){
        $this->conexao = $conexao;
    }

    public function salvar(Contato $contato){

        $nome      = strip_tags($contato->getNome());
        $telefone  = strip_tags($contato->getTelefone());
        $email     = strip_tags($contato->getEmail());
        $descricao = strip_tags($contato->getDescricao());
        $data      = strip_tags($contato->getDtNascimento());
        $favorito  = $contato->getFavorito();
        $cep       = strip_tags($contato->getCEP());
        $cpf       = strip_tags($contato->getCPF());

        $sql ="INSERT INTO contatos 
                       (nome, telefone, email, descricao, dataNascimento, favorito, cep, cpf)
                VALUES (:nome,:telefone,:email,:descricao,:dataNascimento,:favorito,:cep,:cpf)";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(':nome',$nome);
        $stmt->bindValue(':telefone',$telefone);
        $stmt->bindValue(':email',$email);
        $stmt->bindValue(':descricao',$descricao);
        $stmt->bindValue(':dataNascimento',$data);
        $stmt->bindValue(':favorito',$favorito);
        $stmt->bindValue(':cep',$cep);
        $stmt->bindValue(':cpf',$cpf);

        $stmt->execute();
    }


    public function atualizar(Contato $contato){
        $id        = $contato->getId();
        $nome      = strip_tags($contato->getNome());
        $telefone  = strip_tags($contato->getTelefone());
        $email     = strip_tags($contato->getEmail());
        $descricao = strip_tags($contato->getDescricao());
        $data      = strip_tags($contato->getDtNascimento());
        $favorito  = $contato->getFavorito();
        $cep       = strip_tags($contato->getCEP());
        $cpf       = strip_tags($contato->getCPF());

        $sql ="UPDATE contatos SET nome =:nome, telefone =:telefone, 
                email =:email, descricao =:descricao,
                dataNascimento =:data, favorito =:favorito, cep =:cep, cpf =:cpf
            WHERE id =:id";

        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(':nome',$nome);
        $stmt->bindValue(':telefone',$telefone);
        $stmt->bindValue(':descricao',$descricao);
        $stmt->bindValue(':email',$email);
        $stmt->bindValue(':data',$data);
        $stmt->bindValue(':favorito',$favorito);
        $stmt->bindValue(':cep',$cep);
        $stmt->bindValue(':cpf',$cpf);
        $stmt->bindValue(':id',$id);

        $stmt->execute();

    }

 public function remover($id){

        $id = strip_tags($id);

        $sql = "DELETE FROM contatos WHERE id =:id";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id',$id);

        $stmt->execute();
 }

 private function buscarContatos(){
    $sql = "SELECT * FROM contatos";
   
    $resultado = $this->conexao->query($sql, PDO::FETCH_CLASS, 'Contato')->fetchAll();
    return $resultado;
}

public function buscar($id = 0){

    if($id>0){
       return $this->buscarContato($id);
    }

    return $this->buscarContatos();
}

    private function buscarContato($id)
    {
        $id = strip_tags($id);
        $sqlBusca = 'SELECT * FROM contatos WHERE id =:id';
        $resultado = $this->conexao->prepare($sqlBusca);
        $resultado->bindValue(':id',$id);
        $resultado->execute();
       
        $contato = $resultado->fetchObject('Contato');
        

        return $contato;
    }

    public function buscaFavoritos() {
        $sql = 'SELECT * FROM contatos WHERE favorito = 1 ';

        $resultado = $this->conexao->query($sql, PDO::FETCH_CLASS, 'Contato')->fetchAll();
        return $resultado;
    }
    
}