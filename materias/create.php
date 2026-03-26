<?php
    require_once("../config/conexao.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST["nome"];
        

        $sql = "INSERT INTO materias (nome) VALUES ('$nome')";
        
        if(mysqli_query($conexao, $sql)){
            header("Location: index.php");
            exit();
        } else {
            echo "Erro: " . mysqli_error($conexao);
        }
    }
?>