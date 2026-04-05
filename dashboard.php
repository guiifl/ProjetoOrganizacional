<?php
session_start();
require_once "config/conexao.php";

$conexao->query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_ASSOC);

if (!isset($_SESSION['id_usuario'])) {
    $_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
    header("Location: usuário/login.php");
    exit;
}

$materias = $conexao->query("SELECT * FROM materias")->fetchAll(PDO::FETCH_ASSOC);
$dificuldades = $conexao->query("SELECT * FROM dificuldades")->fetchAll(PDO::FETCH_ASSOC);
$disponibilidade = $conexao->query("SELECT * FROM disponibilidade")->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/layout.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>
    <header>
        <h2>Dashboard</h2>
    </header>
    
    <div class="dashboard-grid">
        
        <div class="dashboard-card">
            <h3>Matérias</h3>
            <a href="materias/index.php">Ver matérias</a>
            <h4>Numero de matérias</h4>
            <span><?php echo count($materias); ?></span>
        </div>
    
        <div class="dashboard-card">
            <h3>Dificuldades</h3>
            <a href="dificuldades/index.php">Ver dificuldades</a>
            <h4>Numero de dificuldades</h4>
            <span><?php echo count($dificuldades); ?></span>
        </div>
    
        <div class="dashboard-card">
            <h3>Disponibilidade</h3>
            <a href="disponibilidade/index.php">Ver horários</a>
            <h4>Numero de horários disponíveis</h4>
            <span><?php echo count($disponibilidade); ?></span>

        </div>
    
    </div>
</body>
</html>
