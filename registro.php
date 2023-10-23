<?php
session_start();

require_once 'config.php';
require_once 'public/controllers/UsuarioController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
$usuario = $_POST['usuario']; 
$senha = password_hash($_POST["senha"], PASSWORD_BCRYPT);
$email = $_POST["email"];

$UsuarioController = new UsuarioController($pdo);
$UsuarioController->criarUsuario($email,$senha,$usuario);



$_SESSION["usuarios"] = $usuarios;
 header("Location:login.php");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Registro</title>
</head>
<body>
    <h2>Registro</h2>
    <form method="post">
        <input type="text" name= "usuario" placeholder="Nome de Usuario"required><br>
        <input type="password" name="senha" placeholder="senha" required><br>
        <input type="email" name="email" placeholder="Email" required>
        <br>
        <input type="submit" value="cadastrar"> 
    </form>
</body>
</html>