<?php
 require_once 'config.php';


 try {
   $conexao = new PDO(BD_CONEXAO,BD_USUARIO,BD_SENHA);
 } catch (PDOException $e) {
    echo "Erro na conexão: ".$e->getMessage();
    die();
 }


 

