<?php
session_start();

if(!isset($_SESSION['usuario'])) {
    header("Location:login.php");
    exit;
}

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
</body>
</html>