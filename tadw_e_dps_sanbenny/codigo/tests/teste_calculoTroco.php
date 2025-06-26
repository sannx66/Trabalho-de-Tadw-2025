<?php 
    require_once "../funcoes.php";
    require_once "../conexao.php";

    $idcarrinho = 5;
    

    echo "<pre>";
    print_r(calculoTroco($conexao, $idcarrinho));
    echo "</pre>";

?>
<!-- Funcionou -->