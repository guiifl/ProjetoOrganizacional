<?php
require_once "../config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];

    $sql = "INSERT INTO materias (nome) VALUES (:nome)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":nome", $nome);

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