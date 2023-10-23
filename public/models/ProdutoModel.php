<?php
class ProdutoModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarProduto($nome,$quantidade, $preco) {
        $sql = "INSERT INTO produtos (nome, quantidade, preco) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $quantidade, $preco]);
    }
    
    public function listarProduto() {
        $sql = "SELECT * FROM produtos";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Implementar métodos para atualizar e excluir produtos
    public function excluirProduto($id_Produto) {
        $sql = "DELETE FROM produtos WHERE id_produto = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_Usario]);
    }
    public function atualizarUsuario($email, $senha, $usuario) {
        $sql = "UPDATE produtos SET email = ?, senha = ?, usuario = ?,WHERE id_usario = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email, $senha, $usuario]);
}
}
?>
