<?php
session_start();

require_once 'config.php';
require_once 'public/controllers/ProdutoController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
$nome = $_POST['nome']; 
$quantidade = $_POST["quantidade"];
$preco = $_POST["preco"];

$ProdutoController = new ProdutoController($pdo);
$ProdutoController->criarProduto($nome,$quantidade,$preco);



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
        <input type="text" name= "nome" placeholder="Nome de Produto"required><br>
        <input type="text" name="quantidade" placeholder="quantidade" required><br>
        <input type="text" name="preco" placeholder="Preço do Produto" required>
        <br>
        <input type="submit" value="cadastrar"> 
    </form>
</body>
</html>