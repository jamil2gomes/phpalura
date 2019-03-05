<?php
   require 'config.php';


   try {
    $conexao = new PDO(BD_CONEXAO,BD_USUARIO,BD_SENHA);
  } catch (PDOException $e) {
     echo "Erro na conexão: ".$e->getMessage();
     die();
  }
 
 

   /* function buscar_contatos($conexao){

        $sqlBusca = 'SELECT * FROM contatos';

        $resultado = mysqli_query($conexao, $sqlBusca);

        $contatos = array();

        while ($contato = mysqli_fetch_assoc($resultado)) {
            $contatos[] = $contato;
        }

        return $contatos;
    }


    function buscar_favoritos($conexao){

        $sqlBusca = 'SELECT * FROM contatos WHERE favorito = 1 ';

        $resultado = mysqli_query($conexao, $sqlBusca);

        $contatos = array();

        while ($contato = mysqli_fetch_assoc($resultado)) {
            $contatos[] = $contato;
        }

        return $contatos;
    }


    function gravar_contato($conexao, $contato) {
        $sqlGravar = "
            INSERT INTO contatos
            (nome, telefone, email, descricao, dataNascimento, favorito, cep, cpf)
            VALUES(
            '{$contato['nome']}',
            '{$contato['telefone']}',
            '{$contato['email']}',
            '{$contato['descricao']}',
            '{$contato['dataNascimento']}',
            '{$contato['favorito']}',
            '{$contato['cep']}',
            '{$contato['cpf']}'
            )
        ";
        mysqli_query($conexao, $sqlGravar);
    }


    function buscar_contato($conexao, $id) {

        $sqlBusca = "SELECT * FROM contatos WHERE id = " . $id;

        $resultado = mysqli_query($conexao, $sqlBusca);

        return mysqli_fetch_assoc($resultado);
    }



    function editar_contato($conexao, $contato) {
        $sqlEditar = " 
            UPDATE contatos SET
                nome = '{$contato['nome']}',
                telefone = '{$contato['telefone']}',
                email = '{$contato['email']}',
                descricao = '{$contato['descricao']}',
                dataNascimento = '{$contato['dataNascimento']}',
                favorito = '{$contato['favorito']}',
                 cep     = '{$contato['cep']}',
                 cpf     = '{$contato['cpf']}'   
            WHERE id = {$contato['id']}
        ";

        mysqli_query($conexao, $sqlEditar);
    }


    function remover_contato($conexao, $id) {
        $sqlRemover = "DELETE FROM contatos WHERE id = {$id}";
        
        mysqli_query($conexao, $sqlRemover);
    }


    function gravar_anexo($conexao, $anexo) {
        $sqlGravar = "
            INSERT INTO anexo
            (contato_id, nome, arquivo)
            VALUES(
                {$anexo['contato_id']},
                '{$anexo['nome']}',
                '{$anexo['arquivo']}'
            )";

        mysqli_query($conexao, $sqlGravar);
    }

    function buscar_anexos($conexao, $contato_id) {

        $sql = "SELECT * FROM anexo WHERE contato_id = {$contato_id}";

        $resultado = mysqli_query($conexao, $sql);

        $anexos = array();
        while ($anexo = mysqli_fetch_assoc($resultado)) {
            $anexos[] = $anexo;
        }

        return $anexos;
    }


    function buscar_anexo($conexao, $id){
        $sql = 'SELECT * FROM anexo WHERE id ='.$id;
        $resultado = mysqli_query($conexao, $sql);
        return mysqli_fetch_assoc($resultado);
    
    }
    
    function remover_anexo($conexao, $id){
        $sql = "DELETE FROM anexo WHERE id = {$id}";
        mysqli_query($conexao, $sql);
    }*/
