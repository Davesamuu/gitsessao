<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST')
 {
$usuario = $_POST['usuario']; 
$senha = password_hash($_POST["senha"], PASSWORD_BCRYPT);
$email = $_POST["email"];

try { $pdo = new PDO("mysql:host=localhost; dbname=autenticacao", "root", "");
$pdo->setAttribute (PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
 } catch (PDOException $e) 
 { die("Erro na conexão com o banco de dados: " . $e->getMessage(
   ));
 }

// Insira os dados na tabela 'users' 
$stmt = $pdo->prepare("INSERT INTO usuarios (email, senha, usuario) VALUES (?, ?, ?)");
$stmt->execute([$email, $senha, $usuario]);

$_SESSION["usuarios"] = $usuarios;
 header("Location:dashboard.php");
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