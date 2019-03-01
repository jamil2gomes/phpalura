<?php

class ContatoRepositorio{

    private $conexao;

    public function __construct($conexao){
        $this->conexao = $conexao;
    }

    public function salvar(Contato $contato){

        $nome      = $contato->getNome();
        $telefone  = $contato->getTelefone();
        $email     = $contato->getEmail();
        $descricao = $contato->getDescricao();
        $data      = $contato->getDtNascimento();
        $favorito  = $contato->getFavorito();
        $cep       = $contato->getCEP();
        $cpf       = $contato->getCPF();

        $sql ="INSERT INTO contatos (nome,telefone,email,descricao,dataNascimento,favorito,cep,cpf)
                VALUES (
                '{$nome}',
                '{$telefone}',
                '{$email}',
                '{$descricao}',
                '{$data}',
                {$favorito},
                '{$cep}',
                '{$cpf}'
                )";

        $this->conexao->query($sql);
    }


    public function atualizar(Contato $contato){
        $id        = $contato->getId();
        $nome      = $contato->getNome();
        $telefone  = $contato->getTelefone();
        $email     = $contato->getEmail();
        $descricao = $contato->getDescricao();
        $data      = $contato->getDtNascimento();
        $favorito  = $contato->getFavorito();
        $cep       = $contato->getCEP();
        $cpf       = $contato->getCPF();

        $sql ="UPDATE contatos SET nome = '{$nome}', telefone = '{$telefone}', 
                email = '{$email}',descricao = '{$descricao}',
                dataNascimento = '{$data}', favorito = {$favorito} ,cep = '{$cep}',cpf = '{$cpf}'
            WHERE id = {$id}";

        $this->conexao->query($sql);
    }

 public function remover($id){
        $sql = "DELETE FROM contatos WHERE id = {$id}";
        $this->conexao->query($sql);
 }

 private function buscarContatos(){
    $sql = "SELECT * FROM contatos";
    $resultado = $this->conexao->query($sql);

    $contatos = [];
    while ($contato = $resultado->fetch_object('Contato')){
        $contatos[] = $contato; 
    }
     return $contatos;
}

public function buscar($id = 0){

    if($id>0){
       return $this->buscarContato($id);
    }

     return $this->buscarContatos();
}

    private function buscarContato($id)
    {
        $sqlBusca = 'SELECT * FROM contatos WHERE id = ' . $id;
        $resultado = $this->conexao->query($sqlBusca);
        $contato = $resultado->fetch_object('Contato');

        return $contato;
    }

    public function buscaFavoritos() {
        $sql = 'SELECT * FROM contatos WHERE favorito = 1 ';
        $resultado = $this->conexao->query($sql);

        $contatos = [];
        while ($contato = $resultado->fetch_object('Contato')){
            $contatos[] = $contato; 
        }
        return $contatos;
    }
    
}