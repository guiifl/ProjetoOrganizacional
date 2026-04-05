<?php
session_start();
require_once "../config/conexao.php";

if (!isset($_SESSION['id_usuario'])) {
    $_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
    header("Location: ../usuário/login.php");
    exit;
}


$materias = $conexao->query("SELECT * FROM materias")->fetchAll(PDO::FETCH_ASSOC);
$dificuldades = $conexao->query("SELECT * FROM dificuldades")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $materia_id = $_POST["id_materia"];
    $data = $_POST["data"];
    $dificuldade_id = $_POST["id_dificuldade"];

    $sql = "INSERT INTO provas (id_materia, data_prova, id_dificuldade)
            VALUES (:id_materia, :data, :id_dificuldade)";
    
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":id_materia", $materia_id);
    $stmt->bindParam(":data", $data);
    $stmt->bindParam(":id_dificuldade", $dificuldade_id);
 

    if ($stmt->execute()) {
        echo "Prova cadastrada!";
    } else {
        echo "Erro ao cadastrar.";
        die();
    }

}

?>

<form method="POST">
    <select name="id_materia">
        <?php foreach ($materias as $m): ?>
            <option value="<?= $m['id'] ?>"><?= $m['nome'] ?></option>
        <?php endforeach; ?>
    </select>

    <input type="date" name="data" required>

    <select name="id_dificuldade">
        <?php foreach ($dificuldades as $d): ?>
            <option value="<?= $d['id'] ?>"><?= $d['nome'] ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Cadastrar</button>
</form>