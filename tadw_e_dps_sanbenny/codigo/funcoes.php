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
//toddy

function cadastrarCliente($conexao, $email, $senha, $nome, $telefone, $endereco) { 
    $sql = "INSERT INTO tb_cliente (email, senha, nome, telefone, endereco) VALUES (?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'sisis', $email, $senha, $nome, $telefone, $endereco);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
};
function verificarLogin_cliente($conexao, $email, $senha) {};
function verificarLogado_cliente($conexao) {};
function listarClientes($conexao) {};
function editarCliente($conexao, $email, $senha, $nome, $telefone, $endereco) {};
function deletarCliente($conexao, $idcliente) {};
function pesquisarCliente($conexao, $idcliente) {};
//sandy


function salvarProduto($conexao, $disponivel, $tipo, $nome, $ingredientes, $valor_un) {
    $sql = "INSERT INTO tb_produto (disponivel, tipo, nome, ingredientes, valor_un) VALUES (?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
   
   mysqli_stmt_bind_param($comando, 'isssd', $disponivel, $tipo, $nome, $ingredientes, $valor_un);
   
   mysqli_stmt_execute($comando);
   mysqli_stmt_close($comando);
}

// funcionando

function listarProdutos($conexao) {
    $sql = "SELECT * FROM tb_produto";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultados = mysqli_stmt_get_result($comando);

    $lista_produtos = [];
    while ($produto = mysqli_fetch_assoc($resultados)) {
        $lista_produtos[] = $produto;
    }
    mysqli_stmt_close($comando);

    return $lista_produtos;
}

// funcionando

function editarProduto($conexao, $disponivel, $tipo, $nome, $ingredientes, $valor_un, $idproduto){
    $sql = "UPDATE tb_produto SET disponivel=?, tipo=?, nome=?, ingredientes=?, valor_un=? WHERE idproduto=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'isssdi',$disponivel, $tipo, $nome, $ingredientes, $valor_un, $idproduto);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}

// funcionando


function pesquisarProdutoId($conexao, $idproduto) {
    $sql = "SELECT * FROM tb_produto WHERE idproduto = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idproduto);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $produto = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $produto;
}

// funcionando

function deletarProduto($conexao, $idproduto) {
    $sql = "DELETE FROM tb_produto WHERE idproduto = ?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'i', $idproduto);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}

// funcionando
//izabella

function salvarCarrinho($conexao, $produto, $quantidade, $valor_un, $valor_entrega, $valor_total, $valor_pago, $troco, $data_hora, $idcliente) { $sql = "INSERT INTO tb_venda (idcliente, idproduto, valor_total, data) VALUES (?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'iids', $idcliente, $idproduto, $valor_total, $data);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;

};

function oaarCarrinho($conexao, $valor_entrega, $valor_total, $valor_pago, $troco, $data_hora, $idcliente) {};
function listarCarrinho($conexao) {};
function listarItensCarrinho ($conexao, $id_venda, $id_produto, $quantidade) {
    $sql = "INSERT INTO tb_item_venda (idvenda, idproduto, quantidade) VALUES (?, ?, ?)";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'iid', $id_venda, $id_produto, $quantidade);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
}
function editarCarrinho($conexao, $valor_entrega, $valor_total, $valor_pago, $troco, $data_hora, $idcliente) {};
function deletarCarrinho($conexao, $idcarrinho) {};
function pesquisarCarrinho($conexao, $nome) {};
//toddy

function calculoTotal ($conexao, $quantidade, $valor_un) {};
function calculoEntrega ($conexao, $valor_total, $entrega) {};
function calculoTroco ($valor_pago, $valor_total) {};
//sandy

function salvarEntrega($conexao, $entregador, $idcarrinho) {
    $sql = "INSERT INTO tb_entrega (entregador, idcarrinho) VALUES (?, ?)";
   $comando = mysqli_prepare($conexao, $sql);
   
   mysqli_stmt_bind_param($comando, 'si', $entregador, $idcarrinho);
   
   mysqli_stmt_execute($comando);
   mysqli_stmt_close($comando);
}

function listarEntregas($conexao) {
    $sql = "SELECT * FROM tb_entrega";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultados = mysqli_stmt_get_result($comando);

    $lista_entregas = [];
    while ($entrega = mysqli_fetch_assoc($resultados)) {
        $lista_entregas[] = $entrega;
    }
    mysqli_stmt_close($comando);

    return $lista_entregas;
}

function editarEntrega($conexao, $entregador, $idcarrinho, $identrega){
    $sql = "UPDATE tb_entrega SET entregador=?, idcarrinho=?WHERE identrega=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'sii',$entregador, $idcarrinho, $identrega);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}

function pesquisarEntregaId($conexao, $identrega) {
    $sql = "SELECT * FROM tb_entrega WHERE identrega = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $identrega);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $entrega = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $entrega;
}

function deletarEntrega($conexao, $identrega) {
    $sql = "DELETE FROM tb_entrega WHERE identrega = ?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'i', $identrega);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}

//izabella

// ADICIONAR VALOR PAGO E VALOR ENTREGA NO CARRINHO pronto
// carrinho = venda 
// izabella - produto e entrega
// toddy - login e carrinho
// sandy - calculo e clientes 