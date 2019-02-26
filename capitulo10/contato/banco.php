<?php
    $bdServidor = '127.0.0.1';
    $bdUsuario = 'root';
    $bdSenha = 'j4m1l!123';
    $bdBanco = 'contatos';

    $conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

    if (mysqli_connect_errno($conexao)) {
        echo "Problemas para conectar no banco. Verifique os dados!";
        die();
    }

    function buscar_contatos($conexao){

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
                 cpf     = '{$contato['cpf']}   
            WHERE id = {$contato['id']}
        ";

        mysqli_query($conexao, $sqlEditar);
    }


    function remover_contato($conexao, $id) {
        $sqlRemover = "DELETE FROM contatos WHERE id = {$id}";
        
        mysqli_query($conexao, $sqlRemover);
    }