<?php

    session_start();
    require_once "../config/conexao.php";

    if (!isset($_SESSION['id_usuario'])) {
    $_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
    header("Location: ../usuário/login.php");
    exit;
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dia = $_POST["dia_semana"];
    $inicio = $_POST["hora_inicio"];
    $fim = $_POST["hora_fim"];

    $sql = "INSERT INTO disponibilidade (dia_semana, hora_inicio, hora_fim, id_usuario)
        VALUES (:dia, :inicio, :fim, :id_usuario)";

    
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":dia", $dia);
    $stmt->bindParam(":inicio", $inicio);
    $stmt->bindParam(":fim", $fim);
    $stmt->bindParam(":id_usuario", $_SESSION["id_usuario"]);

    if ($stmt->execute()) {
        echo "Disponibilidade Salva!";
        
        }else{
            echo "Erro ao salvar.";
            die();
    }
}
?>

<form method="POST">

    <select name="dia_semana">
        <option value="1">Segunda</option>
        <option value="2">Terça</option>
        <option value="3">Quarta</option>
        <option value="4">Quinta</option>
        <option value="5">Sexta</option>
        <option value="6">Sábado</option>
        <option value="0">Domingo</option>
    </select>

    <label>Intervalo de tempo disponível</label>
    <input type="time" name="hora_inicio" required>
    <input type="time" name="hora_fim" required>

    <button type="submit">Salvar</button>
</form>