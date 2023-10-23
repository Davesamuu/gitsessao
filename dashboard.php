<?php
session_start();

require_once 'config.php';
require_once 'public/controllers/UsuarioController.php';

if(!isset($_SESSION['usuario'])) {
    header("Location:login.php");
    exit;
}

$UsuarioController = new UsuarioController($pdo);
$UsuarioController->exibirListaUsuario();

echo "Bem-vindo, " . $_SESSION["usuario"] . "Esta é a pagina de dashboard.";

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <a href="logout.php">Sair</a>
</body>
</html>