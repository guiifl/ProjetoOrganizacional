<?php
session_start();
require_once "../config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stmt = $conexao->prepare($sql);
    $stmt->execute(["email" => $email]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario["senha"])) {
        $_SESSION["id_usuario"] = $usuario["id"];
        $_SESSION["nome"] = $usuario["nome"];

        echo "Login realizado!";
        if (isset($_SESSION['redirect'])) {
            $redirect = $_SESSION['redirect'];
            unset($_SESSION['redirect']);
        header("Location: $redirect");
        }else{
        header("Location: /GitHub/ProjetoOrganizacional/dashboard.php");
        }
        exit();
    } else {
        echo "Email ou senha inválidos.";
    }
}
?>

<form method="POST">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="senha" placeholder="Senha">
    <button type="submit">Entrar</button>
</form>