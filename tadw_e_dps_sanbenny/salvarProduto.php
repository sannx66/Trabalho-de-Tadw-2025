<?php
// Inclui o arquivo de funções
require_once './codigo/funcoes.php';

// Conexão com o banco de dados
require_once "./codigo/conexao.php";


if (!$conexao) {
    die('Erro na conexão com o banco de dados: ' . mysqli_connect_error());
}

// Recebe os dados do formulário via POST
$disponivel   = isset($_POST['disponivel']) ? ($_POST['disponivel']) :"" ;
$tipo         = isset($_POST['tipo']) ? $_POST['tipo'] : '';
$nome         = isset($_POST['nome']) ? $_POST['nome'] : '';
$ingredientes = isset($_POST['ingredientes']) ? $_POST['ingredientes'] : '';
$valor_un     = isset($_POST['valor_un']) ? ($_POST['valor_un']) : "";
$observacoes  = isset($_POST['observacoes']) ? $_POST['observacoes'] : '';

// Chama a função para salvar o produto
salvarProduto($conexao, $disponivel, $tipo, $nome, $ingredientes, $valor_un, $observacoes);

// Fecha a conexão
mysqli_close($conexao);

// Redireciona ou exibe mensagem
echo "Produto cadastrado com sucesso! <a href='codigo/formProduto.php'>Cadastrar outro produto</a>";