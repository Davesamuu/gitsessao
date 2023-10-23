<?php
require_once 'public/models/UsuarioModel.php';


class UsuarioController {
    private $UsuarioModel;

    public function __construct($pdo) {
        $this->UsuarioModel = new UsuarioModel($pdo);
    }

    public function criarUsuario($email, $senha, $usuario) {
        $this->UsuarioModel->criarUsuario($email, $senha, $usuario);
    }

    public function listarUsuario() {
        return $this->UsuarioModel->listarUsuario();
    }

    public function exibirListaUsuario() {
        $usuarios = $this->UsuarioModel->listarUsuario();
        include 'public/views/usuarios/lista.php';
    }

    public function excluirUsuario($id_usuario) {
        $this->UsuarioModel->excluirUsuario($id_usuario);
    }

    public function atualizarUsuario($email, $senha, $usuario) {
        $this->UsuarioModel->atualizarusuario
        ($email, $senha, $usuario);
    }
}

    
?>
