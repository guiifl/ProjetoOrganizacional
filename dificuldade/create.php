<?php
require_once "../config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $nivel = $_POST["nivel"];
    $cor = $_POST["cor"];
    $descricao = $_POST["descricao"];

    $sql = "INSERT INTO dificuldades (nome, nivel, cor, descricao)
            VALUES (:nome, :nivel, :cor, :descricao)";

    $stmt = $conexao->prepare($sql);

    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":nivel", $nivel);
    $stmt->bindParam(":cor", $cor);
    $stmt->bindParam(":descricao", $descricao);

    if ($stmt->execute()) {
        echo "Dificuldade cadastrada!";
    } else {
        echo "Erro ao cadastrar.";
        die();
    }
}
?>

<form method="POST">
    <input type="text" name="nome" placeholder="Nome (Fácil, Médio,...)" required>

    <select name="nivel" required>
        <option value="1">Fácil</option>
        <option value="2">Médio</option>
        <option value="3">Difícil</option>
    </select>

    <input type="color" name="cor" required>

    <textarea name="descricao" placeholder="Descrição"></textarea>

    <button type="submit">Cadastrar</button>
</form>