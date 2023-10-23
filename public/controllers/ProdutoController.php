<?php
require_once ('public/models/ProdutoModel.php');


class ProdutoController {
    private $ProdutoModel;

    public function __construct($pdo) {
        $this->ProdutoModel = new ProdutoModel($pdo);
    }

    public function criarProduto($nome, $quantidade, $preco) {
        $this->ProdutoModel->criarProduto($nome, $quantidade, $preco);
    }

    public function listarProduto() {
        return $this->produtoModel->listarProduto();
    }

    public function exibirListaProduto() {
        $preco = $this->produtoModel->listarProduto();
        include 'views/Produtos/lista.php';
    }

    public function excluirProduto($id_produto) {
        $this->produtoModel->excluirProduto($id_produto);
    }

    public function atualizarProduto($nome, $quantidade, $preco) {
        $this->produtoModel->atualizarproduto
        ($nome, $quantidade, $preco);
    }
}

    
?>
