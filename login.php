<?php 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    // Conecte ao banco de dados usando PDO
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=autenticacao", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }  catch (PDOException $e) {
         die("Erro na conexão com o banco de dados: " . $e->getMessage(
    ));
}

// Verifique se o usuario existe e a senha está correta
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ?");
$stmt->execute([$usuario]);
$user = $stmt->fetch();

if ($user && password_verify($senha, $user["senha"])) {
    $_SESSION["usuario"] = $usuario;
    header("Location: dashboard.php");
    } else {
        echo "<script>alert('login falhou. Verifique suas credencias.')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Tela de login</h2>
    <form method="post">
        <input type="text" name="usuario" placeholder="Nome de Usuário
        " required><br>
        <input type="password" name="senha" placeholder="Senha"
        required><br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>