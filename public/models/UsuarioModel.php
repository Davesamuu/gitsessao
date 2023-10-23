<?php
class UsuarioModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criarUsuario($email, $senha, $usuario) {
        $sql = "INSERT INTO usuarios (email, senha,usuario) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email, $senha, $usuario]);
    }
    
    public function listarUsuario() {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Implementar métodos para atualizar e excluir usuarios
    public function excluirUsuario($id_usario) {
        $sql = "DELETE FROM usuarios WHERE id_usario = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id_Usario]);
    }
    public function atualizarUsuario($email, $senha, $usuario) {
        $sql = "UPDATE usuarios SET email = ?, senha = ?, usuario = ?,WHERE id_usario = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email, $senha, $usuario]);
}
}
?>
