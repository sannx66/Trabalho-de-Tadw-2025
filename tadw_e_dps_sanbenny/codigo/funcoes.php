<?php

function login($conexao, $nome, $email, $senha) {};
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
function editarProduto() {};
function deletarProduto() {};
function pesquisarProduto() {};

function salvarCarrinho($conexao, $produto, $quantidade, $valor_un, $valor_entrega, $valor_total, $valor_pago, $troco, $data_hora, $idcliente) {};
function listarCarrinho($conexao) {};
function editarCarrinho() {};
function deletarCarrinho() {};
function pesquisarCarrinho() {};

function calculoTotal ($conexao, $quantidade, $valor_un) {};
function calculoEntrega ($conexao, $valor_total, $entrega) {};
function calculoTroco ($valor_pago, $valor_total) {};

function cadastrarEntrega($conexao, $id_cliente, $id_carrinho) {};
function listarEntrega($conexao) {};
function editarEntrega() {};
function deletarEntrega() {};
function pesquisarEntrega() {};

// ADICIONAR VALOR PAGO E VALOR ENTREGA NO CARRINHO pronto
// carrinho = venda 