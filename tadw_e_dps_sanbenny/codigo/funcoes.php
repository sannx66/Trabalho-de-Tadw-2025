<?php

function salvarCliente($conexao, $email, $senha, $nome, $telefone, $endereco) { 
    $sql = "INSERT INTO tb_cliente (email, senha, nome, telefone, endereco, tipo) VALUES (?, ?, ?, ?, ?, 'c')";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'sssss', $email, $senha, $nome, $telefone, $endereco);

    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);

    return $funcionou;
};


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

function editarCliente($conexao, $email, $senha, $nome, $telefone, $endereco, $tipo, $idcliente) {
    $sql = "UPDATE tb_cliente SET email=?, senha=?, nome=?, telefone=?, endereco=?, tipo=? WHERE idcliente=?";
    $comando = mysqli_prepare($conexao, $sql);
    
    mysqli_stmt_bind_param($comando, 'ssssssi', $email, $senha, $nome, $telefone, $endereco, $tipo, $idcliente);
    
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou; 
};

// funcionando


function deletarCliente($conexao, $idcliente) {
    // 1. Inicia a transação para segurança
    mysqli_begin_transaction($conexao);

    try {
        // 2. DELETA OS REGISTROS FILHOS (tb_carrinho)
        $sql_carrinho = "DELETE FROM tb_carrinho WHERE idcliente = ?";
        $comando_carrinho = mysqli_prepare($conexao, $sql_carrinho);
        mysqli_stmt_bind_param($comando_carrinho, 'i', $idcliente);
        mysqli_stmt_execute($comando_carrinho); // <-- Aqui seu erro era anteriormente!
        mysqli_stmt_close($comando_carrinho);

        // 3. DELETA O REGISTRO PAI (tb_cliente)
        $sql_cliente = "DELETE FROM tb_cliente WHERE idcliente = ?";
        $comando_cliente = mysqli_prepare($conexao, $sql_cliente);
        mysqli_stmt_bind_param($comando_cliente, 'i', $idcliente);
        $funcionou = mysqli_stmt_execute($comando_cliente);
        mysqli_stmt_close($comando_cliente);

        // 4. Confirma as alterações (se as duas deleções funcionaram)
        mysqli_commit($conexao);
        return $funcionou;

    } catch (mysqli_sql_exception $e) {
        // 5. Desfaz as alterações se algo falhou
        mysqli_rollback($conexao);
        return false;
    }
}
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

function pesquisarclienteNome($conexao, $nome)
{
    $sql = "SELECT * FROM tb_cliente WHERE nome LIKE ?";
    $comando = mysqli_prepare($conexao, $sql);

    $nome = "%" . $nome . "%";
    mysqli_stmt_bind_param($comando, 's', $nome);

    mysqli_stmt_execute($comando);

    $resultados = mysqli_stmt_get_result($comando);

    $lista_cliente = [];
    while ($cliente = mysqli_fetch_assoc($resultados)) {
        $lista_cliente[] = $cliente;
    }
    mysqli_stmt_close($comando);

    return $lista_cliente;
};



//sandy 


function salvarProduto($conexao, $foto, $nome,$disponivel, $tipo, $ingredientes, $valor_un, $observacoes) {
    $sql = "INSERT INTO tb_produto (foto, nome, disponivel, tipo, ingredientes, valor_un, observacoes) VALUES (?, ?, ?, ?, ?, ?,?)";
    $comando = mysqli_prepare($conexao, $sql);
   
   mysqli_stmt_bind_param($comando, 'ssissds',$foto ,$nome,$disponivel, $tipo, $ingredientes, $valor_un, $observacoes);
   
   mysqli_stmt_execute($comando);
   mysqli_stmt_close($comando);
}

// funcionando




function listarProdutostipo($conexao, $tipo) {
    $sql = "SELECT * FROM tb_produto WHERE tipo = ?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 's', $tipo);
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

function listarProdutos($conexao) {
    $sql = "SELECT * FROM tb_produto";
    $comando = mysqli_prepare($conexao, $sql);
    //mysqli_stmt_bind_param($comando, 's', $tipo);
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

function editarProduto($conexao,$idproduto, $foto, $nome,$disponivel, $tipo, $ingredientes, $valor_un, $observacoes){
    $sql = "UPDATE tb_produto SET foto=?, nome=?,disponivel=?, tipo=?, ingredientes=?, valor_un=?, observacoes=? WHERE idproduto=?";
    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'ssissdsi',$foto,$nome,$disponivel, $tipo, $ingredientes, $valor_un, $observacoes, $idproduto);
    $funcionou = mysqli_stmt_execute($comando);
    mysqli_stmt_close($comando);
    
    return $funcionou;
}

// funcionando

function pesquisarProdutoId($conexao, $idproduto)
{
    $sql = "SELECT * FROM tb_produto WHERE idproduto = ?";
    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param($comando, 'i', $idproduto);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);

    $produto = mysqli_fetch_assoc($resultado);

    mysqli_stmt_close($comando);
    return $produto;
};

function pesquisarProdutoNome($conexao, $nome)
{
    $sql = "SELECT * FROM tb_produto WHERE nome LIKE ?";
    $comando = mysqli_prepare($conexao, $sql);

    $nome = "%" . $nome . "%";
    mysqli_stmt_bind_param($comando, 's', $nome);

    mysqli_stmt_execute($comando);

    $resultados = mysqli_stmt_get_result($comando);

    $lista_produtos = [];
    while ($produto = mysqli_fetch_assoc($resultados)) {
        $lista_produtos[] = $produto;
    }
    mysqli_stmt_close($comando);

    return $lista_produtos;
};

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
    // 1. Inicia a transação para garantir a integridade dos dados
    mysqli_begin_transaction($conexao);

    try {
        // 2. DELETA OS REGISTROS FILHOS (tb_entrega)
        // Isso remove a restrição de chave estrangeira
        $sql_entrega = "DELETE FROM tb_entrega WHERE idcarrinho = ?";
        $comando_entrega = mysqli_prepare($conexao, $sql_entrega);
        mysqli_stmt_bind_param($comando_entrega, 'i', $idcarrinho);
        mysqli_stmt_execute($comando_entrega); 
        mysqli_stmt_close($comando_entrega);
        
        // 3. DELETA O REGISTRO PAI (tb_carrinho)
        $sql_carrinho = "DELETE FROM tb_carrinho WHERE idcarrinho = ?";
        $comando = mysqli_prepare($conexao, $sql_carrinho);
        mysqli_stmt_bind_param($comando, 'i', $idcarrinho);
        $funcionou = mysqli_stmt_execute($comando);
        mysqli_stmt_close($comando);

        // 4. Confirma as alterações (se as duas deleções funcionaram)
        mysqli_commit($conexao);
        return $funcionou;
        
    } catch (mysqli_sql_exception $e) {
        // 5. Desfaz as alterações se algo falhou
        mysqli_rollback($conexao);
        // Opcional: Você pode logar o erro aqui ($e->getMessage())
        return false;
    }
}
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




//sandy

function salvarEntrega($conexao, $entregador, $idcarrinho) {
    $sql = "INSERT INTO tb_entrega (entregador, idcarrinho) VALUES (?, ?)";
   $comando = mysqli_prepare($conexao, $sql);
   
   mysqli_stmt_bind_param($comando, 'si', $entregador, $idcarrinho);
   
   mysqli_stmt_execute($comando);
   mysqli_stmt_close($comando);

   header('listarEntregas.php');
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

function verificarlogin($conexao, $email, $senha) {
    $sql = "SELECT * FROM tb_cliente WHERE email = ?";

    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 's', $email);

    mysqli_stmt_execute($comando);
    
    $resultado = mysqli_stmt_get_result($comando);
    $quantidade = mysqli_num_rows($resultado);
    
    $iduser = 0;
    if ($quantidade != 0) {
        $cliente = mysqli_fetch_assoc($resultado);
        $senha_banco = $cliente['senha'];

        if (password_verify($senha, $senha_banco)) {
            $iduser = $cliente['idcliente'];
        }
    }
    return $iduser;
}

function pegarDadosCliente($conexao, $idcliente) {
    $sql = "SELECT nome, tipo FROM tb_cliente WHERE idcliente = ?";

    $comando = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($comando, 'i', $idcliente);

    mysqli_stmt_execute($comando);
    $resultado = mysqli_stmt_get_result($comando);
    $quantidade = mysqli_num_rows($resultado);
    
    if ($quantidade != 0) {
        $cliente = mysqli_fetch_assoc($resultado);
        return $cliente;
    }
    else {
        return 0;
    }
};
function calcularTotalCarrinho($conexao, $idcarrinho) {
    // Soma dos produtos do carrinho
    $sql = "
        SELECT SUM(iv.quantidade * p.valor_un) AS total_produtos
        FROM tb_item_venda iv
        JOIN tb_produto p ON iv.idproduto = p.idproduto
        WHERE iv.idcarrinho = ?
    ";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $idcarrinho);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $linha = mysqli_fetch_assoc($res);
    mysqli_stmt_close($stmt);

    $totalProdutos = $linha['total_produtos'] !== null ? floatval($linha['total_produtos']) : 0;

    // Valor da entrega
    $sqlEntrega = "SELECT valor_entrega FROM tb_carrinho WHERE idcarrinho = ?";
    $stmtEntrega = mysqli_prepare($conexao, $sqlEntrega);
    mysqli_stmt_bind_param($stmtEntrega, 'i', $idcarrinho);
    mysqli_stmt_execute($stmtEntrega);
    $resEntrega = mysqli_stmt_get_result($stmtEntrega);
    $carrinho = mysqli_fetch_assoc($resEntrega);
    mysqli_stmt_close($stmtEntrega);

    $valorEntrega = floatval($carrinho['valor_entrega']);

    // Total final
    $totalFinal = $totalProdutos + $valorEntrega;

    return $totalFinal;
}