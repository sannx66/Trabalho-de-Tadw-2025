<?php 
    require_once "../funcoes.php";
    require_once "../conexao.php";

    $idproduto = 1;
    $quantidade = 4;

    echo "<pre>";
    print_r(calculoTotal($conexao, $idproduto, $quantidade));
    echo "</pre>";

?>
<!-- funcionou -->