<?php
session_start();
require_once "conexao.php";
require_once "funcoes.php";

// ✅ NÃO PODE verificar carrinho vazio aqui
// (pois o carrinho é esvaziado no final)

// dados enviados
$forma_pagamento = $_POST['forma_pagamento'];
$forma_retirada = $_POST['forma_retirada'];
$total_final = $_POST['total_final'];
$taxa = $_POST['taxa'];

// cliente logado
$idcliente = $_SESSION['idcliente'] ?? 1;

$data_hora = date("Y-m-d H:i:s");

// 1) GRAVAR tb_carrinho
$sql = "INSERT INTO tb_carrinho (idcliente, valor_entrega, valor_total, valor_pago, troco, data_hora)
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conexao, $sql);
$valor_pago = 0;
$troco = 0;

mysqli_stmt_bind_param(
    $stmt,
    "idddds",
    $idcliente,
    $taxa,
    $total_final,
    $valor_pago,
    $troco,
    $data_hora
);

mysqli_stmt_execute($stmt);

// pega ID do carrinho gerado
$idcarrinho = mysqli_insert_id($conexao);

// 2) GRAVAR ITENS tb_item_venda
foreach ($_SESSION['carrinho'] as $idproduto => $qtd) {

    $sql_item = "INSERT INTO tb_item_venda (idcarrinho, idproduto, quantidade)
                 VALUES (?, ?, ?)";
    $stmt_item = mysqli_prepare($conexao, $sql_item);

    mysqli_stmt_bind_param($stmt_item, "iii", $idcarrinho, $idproduto, $qtd);
    mysqli_stmt_execute($stmt_item);
}

// 3) GRAVAR ENTREGA
if ($forma_retirada == "delivery") {

    $sql_ent = "INSERT INTO tb_entrega (entregador, idcarrinho)
                VALUES ('a definir', ?)";
    $stmt_ent = mysqli_prepare($conexao, $sql_ent);

    mysqli_stmt_bind_param($stmt_ent, "i", $idcarrinho);
    mysqli_stmt_execute($stmt_ent);
}

// limpar carrinho
unset($_SESSION['carrinho']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pedido Finalizado</title>
    <link rel="stylesheet" href="estilo.css"> 
</head>

<body id="final_page">

    <img id="final_logo" src="fotos/logo_diego.png" alt="Logo">
    <img id="final_img" src="fotos/castiel.webp" alt="Castiel">

    <h1>Pedido Finalizado!</h1>

    <p>Seu pedido foi registrado com sucesso.</p>
    <p>ID do pedido: <b><?php echo $idcarrinho; ?></b></p>

    <a href="categorias.php">Voltar ao menu</a>

</body>
</html>
