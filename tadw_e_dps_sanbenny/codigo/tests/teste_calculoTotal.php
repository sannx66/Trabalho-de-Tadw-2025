<?php 
    require_once "../funcoes.php";
    require_once "../conexao.php";

    $idcarrinho = 3;
    $valor_total = 50;

    echo "<pre>";
    print_r(calculoEntrega($conexao, $idcarrinho, $valor_total));
    echo "</pre>";

    echo"calculoEntrega";
?>

<!-- calculo entrega ------ vai virar calculo total -->

<!-- funcionou -->