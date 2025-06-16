<?php 
    require_once "../funcoes.php";
    require_once "../conexao.php";

    $idcarrinho = 3;
    

    echo "<pre>";
    print_r(calculoTroco($conexao, $idcarrinho));
    echo "</pre>";

?>
<!-- Funcionou -->