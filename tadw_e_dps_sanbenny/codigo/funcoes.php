<?php

function salvarLogin($conexao, $nome, $email, $senha) {
    $sql = "INSERT INTO login (nome, email, senha) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sss', $nome, $email, $senha);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
};


function verificarLogin($conexao, $email, $senha) {};
function verificarLogado($conexao) {};
function listarLogin($conexao) {};
function deletarLogin($conexao, $idlogin) {};
function pesquisarLogin($conexao, $idlogin) {};


function cadastrarCliente($conexao, $email, $senha, $nome, $telefone, $endereco) {}; 
function verificarLogin_cliente($conexao, $email, $senha) {};
function verificarLogado_cliente($conexao) {};
function listarClientes($conexao) {};
function editarCliente($conexao, $email, $senha, $nome, $telefone, $endereco) {};
function deletarCliente($conexao, $idcliente) {};
function pesquisarCliente($conexao, $idcliente) {};
 

function cadastrarProduto($conexao, $disponivel, $tipo, $nome, $ingredientes, $valor_un) {};
function listarProdutos($conexao) {};
function editarProduto($conexao, $disponivel, $tipo, $nome, $ingredientes, $valor_un) {};
function deletarProduto($conexao, $idproduto) {};
function pesquisarProduto($conexao, $nome) {};
// quero encontrar o produto pelo nome 

function salvarCarrinho($conexao, $produto, $quantidade, $valor_un, $valor_entrega, $valor_total, $valor_pago, $troco, $data_hora, $idcliente) { $sql = "INSERT INTO tb_venda (idcliente, idproduto, valor_total, data) VALUES (?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'iids', $idcliente, $idproduto, $valor_total, $data);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;

};

function salvarCarrinho($conexao, $valor_entrega, $valor_total, $valor_pago, $troco, $data_hora, $idcliente) {};
function listarCarrinho($conexao) {};
function listarItensCarrinho($conexao) {};
function editarCarrinho($conexao, $valor_entrega, $valor_total, $valor_pago, $troco, $data_hora, $idcliente) {};
function deletarCarrinho($conexao, $idcarrinho) {};
function pesquisarCarrinho($conexao, $nome) {};

function calculoTotal ($conexao, $quantidade, $valor_un) {};
function calculoEntrega ($conexao, $valor_total, $entrega) {};
function calculoTroco ($valor_pago, $valor_total) {};

function cadastrarEntrega($conexao, $entregador, $idcarrinho) {};
function listarEntrega($conexao) {};
function editarEntrega($conexao, $entregador, $idcarrinho) {};
function deletarEntrega($conexao, $identrega) {};
function pesquisarEntrega($conexao, $identrega) {};

// ADICIONAR VALOR PAGO E VALOR ENTREGA NO CARRINHO pronto
// carrinho = venda 
// izabella - produto e entrega
// toddy - login e carrinho
// sandy - calculo e clientes 