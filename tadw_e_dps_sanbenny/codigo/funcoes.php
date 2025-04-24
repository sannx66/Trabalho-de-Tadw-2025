<?php

function salvarLogin($conexao, $nome, $email, $senha) {
    $sql = "INSERT INTO login (nome, email, senha) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sss', $nome, $email, $senha);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
};


function verificarLogin() {};
function verificarLogado() {};
function listarLogin() {};
function deletarLogin() {};
function pesquisarLogin() {};


function cadastrarCliente($conexao, $email, $senha, $nome, $telefone, $endereco) {}; 
function verificarLogin_cliente() {};
function verificarLogado_cliente() {};
function listarClientes($conexao) {};
function editarCliente() {};
function deletarCliente() {};
function pesquisarCliente() {};
 

function cadastrarProduto($conexao, $quantidade, $tipo, $nome, $ingredientes, $valor) {};
function listarProdutos($conexao) {};
function editarProduto($conexao, $quantidade, $tipo, $nome, $ingredientes, $valor, $idproduto) {};
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

function listarCarrinho($conexao) {};
function editarCarrinho($conexao, $produto, $quantidade, $valor_un, $valor_entrega, $valor_total, $valor_pago, $troco, $data_hora, $idcliente, $idcarrinho) {};
function deletarCarrinho() {};
function pesquisarCarrinho() {};

function calculoTotal ($conexao, $quantidade, $valor_un) {};
function calculoEntrega ($conexao, $valor_total, $entrega) {};
function calculoTroco ($valor_pago, $valor_total) {};

function cadastrarEntrega($conexao, $id_cliente, $id_carrinho) {};
function listarEntrega($conexao) {};
function editarEntrega($conexao, $id_cliente, $id_carrinho, $identrega) {};
function deletarEntrega($conexao, $identrega) {};
function pesquisarEntrega($conexao, $identrega) {};

// ADICIONAR VALOR PAGO E VALOR ENTREGA NO CARRINHO pronto
// carrinho = venda 
// izabella - produto e entrega
// toddy - login e carrinho
// sandy - calculo e clientes 