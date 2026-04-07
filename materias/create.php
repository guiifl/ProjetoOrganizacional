<?php
session_start();
require_once "../config/conexao.php";

if (!isset($_SESSION['id_usuario'])) {
    $_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
    header("Location: ../usuário/login.php");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];

    $sql = "INSERT INTO materias (nome, id_usuario) VALUES (:nome, :id_usuario)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":id_usuario", $_SESSION['id_usuario']); 

    if ($stmt->execute()) {
        echo "Matéria cadastrada!";
    } else {
        echo "Erro ao cadastrar.";
    }
}
?>

<form method="POST">
    <input type="text" name="nome" placeholder="Nome da matéria" required>
    <button type="submit">Cadastrar</button>
</form>