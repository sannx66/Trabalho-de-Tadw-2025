<?php

//funcionou
function salvarLogin($conexao, $nome, $email, $senha) {
    $sql = "INSERT INTO tb_login (nome, email, senha) VALUES (?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sss', $nome, $email, $senha);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
};


function verificarLogin($conexao, $email, $senha) {};

function verificarLogado($conexao) {};


//funcionou
function listarLogin($conexao) {
    $sql = "SELECT * FROM tb_login";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_execute($comando);
    $resultados = mysqli_stmt_get_result($comando);
    
    $lista_login = [];
    while ($login = mysqli_fetch_assoc($resultados)) {
        $lista_login[] = $login;
    }
    mysqli_stmt_close($comando);

    return $lista_login;
};

//funcionou
function deletarLogin($conexao, $idlogin) {
    $sql = "DELETE FROM tb_login WHERE idlogin = ?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'i', $idlogin);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
};

//funcionou
function pesquisarLogin($conexao, $idlogin) {
    $sql = "SELECT * FROM tb_login WHERE idlogin = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idlogin);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $login = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $login;
}

//funcionou
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

function listarClientes($conexao) { 
    $sql = "SELECT * FROM tb_cliente";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_execute($comando);
    $resultados = mysqli_stmt_get_result($comando);
    
    $lista_clientes = [];
    while ($cliente = mysqli_fetch_assoc($resultados)) {
        $lista_clientes[] = $cliente;
    }
    mysqli_stmt_close($comando);

    return $lista_clientes;
};
// funcionando

function editarCliente($conexao, $email, $senha, $nome, $telefone, $endereco, $idcliente) {
    $sql = "UPDATE tb_cliente SET email=?, senha=?, nome=?, telefone=?, endereco=? WHERE idcliente=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'sisisi', $email, $senha, $nome, $telefone, $endereco, $idcliente);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou; 
};
// funcionando


function deletarCliente($conexao, $idcliente) {
    $sql = "DELETE FROM tb_cliente WHERE idcliente = ?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'i', $idcliente);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
};
// funcionando

function pesquisarClienteId($conexao, $idcliente) {
    $sql = "SELECT * FROM tb_cliente WHERE idcliente = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idcliente);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $cliente = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $cliente;
};
// funcionando
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

function salvarCarrinho($conexao, $idcliente, $valor_entrega, $valor_total, $valor_pago, $troco, $data_hora) {
    $sql = "INSERT INTO tb_carrinho (idcliente, valor_entrega, valor_total, valor_pago, troco, data_hora) VALUES (?, ?, ?, ?, ?, ?)";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'idddds', $idcliente, $valor_entrega, $valor_total, $valor_pago, $troco, $data_hora);

    mysqli_stmt_execute($comando);

    $idcarrinho = mysqli_stmt_insert_id($comando);
    mysqli_stmt_close($comando);

    return $idcarrinho;
};
// funcionando

function listarCarrinho($conexao) {
    $sql = "SELECT * FROM tb_carrinho";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_execute($comando);
    $resultados = mysqli_stmt_get_result($comando);

    $lista_carrinho = [];
    while ($carrinho = mysqli_fetch_assoc($resultados)) {
        $lista_carrinho[] = $carrinho;
    }
    mysqli_stmt_close($comando);

    return $lista_carrinho;
};
// funcionando


function editarCarrinho($conexao, $idcliente, $valor_entrega, $valor_total, $valor_pago, $troco, $data_hora, $idcarrinho) {
    $sql = "UPDATE tb_carrinho SET idcliente=?, valor_entrega=?, valor_total=?, valor_pago=?, troco=?, data_hora=? WHERE idcarrinho=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'iddddsi',$idcliente, $valor_entrega, $valor_total, $valor_pago, $troco, $data_hora, $idcarrinho);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
};
// funcionando


function deletarCarrinho($conexao, $idcarrinho) { 
    $sql = "DELETE FROM tb_carrinho WHERE idcarrinho = ?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'i', $idcarrinho);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
};
// funcionando


function pesquisarCarrinhoId($conexao, $idcarrinho) {
    $sql = "SELECT * FROM tb_carrinho WHERE idcarrinho = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idcarrinho);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $carrinho = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $carrinho;
};
// funcionando


// tb_item_venda -idcarrinho -idproduto -quantidade

function salvarItemVenda($conexao, $idcarrinho, $idproduto, $quantidade) {
    $sql = "INSERT INTO tb_item_venda (idcarrinho, idproduto, quantidade) VALUES (?, ?, ?)";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'iii', $idcarrinho, $idproduto, $quantidade);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
};
// funcionando

function calculoTotal ($conexao, $idproduto, $quantidade) {
    $sql = "SELECT valor_un FROM tb_produto WHERE idproduto = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idproduto);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $produto = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($comando);

    if ($produto) {
        return $quantidade * $produto['valor_un'];
    } else {
        return 0;
    }

};
// funcionou

function calculoEntrega ($conexao, $idcarrinho, $valor_total) {
    $sql = "SELECT valor_entrega FROM tb_carrinho WHERE idcarrinho = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idcarrinho);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $carrinho = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($comando);

    if ($carrinho) {
        $soma= $valor_total + $carrinho['valor_entrega'];
    } else {
        $soma = $valor_total;
    }
    return $soma;
};
// funcionou


function calculoTroco($conexao, $idcarrinho) {
    $sql = "SELECT valor_pago, valor_total FROM tb_carrinho WHERE idcarrinho = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idcarrinho);
    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $carrinho = mysqli_fetch_assoc($resultado);
    mysqli_stmt_close($comando);

    if ($carrinho) {
        return $carrinho['valor_pago'] - $carrinho['valor_total'];
    } else {
        return 'nao tem carrinho';
    }
};
// Funcionou
//sandy

function salvarEntrega($conexao, $entregador, $idcarrinho) {
    $sql = "INSERT INTO tb_entrega (entregador, idcarrinho) VALUES (?, ?)";
   $comando = mysqli_prepare($conexao, $sql);
   
   mysqli_stmt_bind_param($comando, 'si', $entregador, $idcarrinho);
   
   mysqli_stmt_execute($comando);
   mysqli_stmt_close($comando);
}

// funcionando

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
// funcionando

function editarEntrega($conexao, $entregador, $idcarrinho, $identrega){
    $sql = "UPDATE tb_entrega SET entregador=?, idcarrinho=? WHERE identrega=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'sii',$entregador, $idcarrinho, $identrega);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}

// funcionando

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

// funcionando

function deletarEntrega($conexao, $identrega) {
    $sql = "DELETE FROM tb_entrega WHERE identrega = ?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'i', $identrega);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}
// funcionando

//izabella

// ADICIONAR VALOR PAGO E VALOR ENTREGA NO CARRINHO pronto
// carrinho = venda 
// izabella - produto e entrega
// toddy - login e carrinho
// sandy - calculo e clientes 