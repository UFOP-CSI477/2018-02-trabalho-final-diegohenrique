<?php

    require_once('db.class.php');

    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    //$tipo = $_POST['tipo'];
    $tipo = 0;

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = "INSERT INTO usuarios (usuario, email, senha, tipo) VALUES ('$usuario', '$email', '$senha', '$tipo')";

    //executar a query
    if(mysqli_query($link, $sql)){
            $_SESSION['mensagem'] = "Usuário Cadastrado com sucesso! ";
            header("location:index.php");
            exit;
        }else{
            echo "Erro ao registrar o usuário!";
        }

?>